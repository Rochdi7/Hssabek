"use client";

import { useState, useEffect } from "react";
import { Card } from "react-bootstrap";
import Image from "next/image";

const TopSellingProduct = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);

  // Simulate an API call to fetch product data
  useEffect(() => {
    setTimeout(() => {
      setProducts([
        {
          id: 1,
          name: "Tablet PC",
          sold: 2032,
          rating: 5.0,
          // Using "true" for full star, "half" for half star, or false for empty star.
          ratingStars: [true, true, true, true, true],
          image: "/images/product-18.png",
        },
        {
          id: 2,
          name: "Clay Camera",
          sold: 1020,
          rating: 4.9,
          ratingStars: [true, true, true, true, "half"],
          image: "/images/product-19.png",
        },
        {
          id: 3,
          name: "Laptop",
          sold: 99,
          rating: 4.8,
          ratingStars: [true, true, true, true, "half"],
          image: "/images/product-20.png",
        },
        {
          id: 4,
          name: "Zenbook X",
          sold: 89,
          rating: 4.5,
          ratingStars: [true, true, true, true, "half"],
          image: "/images/product-21.png",
        },
        {
          id: 5,
          name: "QCY Airpod",
          sold: 72,
          rating: 4.3,
          // For a rating of 4.3, you might choose to display full stars for the first four and a half star (or empty) for the last one.
          ratingStars: [true, true, true, true, "half"],
          image: "/images/product-22.png",
        },
        {
          id: 6,
          name: "Laptop Mockup",
          sold: 72,
          rating: 4.0,
          ratingStars: [true, true, true, true, false],
          image: "/images/product-18.png",
        },
      ]);
      setLoading(false);
    }, 1000);
  }, []);

  // Function to render rating stars dynamically
  const renderStars = (ratingStars) => {
    return ratingStars.map((star, index) => {
      if (star === true) {
        return <i key={index} className="ri-star-fill text-warning"></i>;
      } else if (star === "half") {
        return <i key={index} className="ri-star-half-line text-warning"></i>;
      } else {
        return <i key={index} className="ri-star-line text-warning"></i>;
      }
    });
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white p-4 mb-4">
        <h3 className="mb-4">Top Selling Product</h3>

        {loading ? (
          <p>Loading...</p>
        ) : (
          <div>
            {products.map((product) => (
              <div
                key={product.id}
                className="d-flex gap-1 justify-content-between align-items-center mb-3 pb-3 border-bottom lcbmp-none"
              >
                <div className="d-flex align-items-center gap-2">
                  <div className="flex-shrink-0">
                    <Image
                      src={product.image}
                      alt={product.name}
                      className="rounded-2"
                      width={32}
                      height={32}
                    />
                  </div>
                  <div className="flex-grow-1">
                    <h4 className="fs-14 fw-semibold mb-0">{product.name}</h4>
                    <span className="fs-12">
                      <span className="fw-bold">{product.sold}</span> sold
                    </span>
                  </div>
                </div>

                <div className="d-flex align-items-center gap-1">
                  {renderStars(product.ratingStars)}
                  <span className="fs-12 position-relative top-1">
                    {product.rating}
                  </span>
                </div>
              </div>
            ))}
          </div>
        )}
      </Card>
    </>
  );
};

export default TopSellingProduct;

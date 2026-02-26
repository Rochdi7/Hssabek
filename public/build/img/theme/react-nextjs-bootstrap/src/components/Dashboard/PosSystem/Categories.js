"use client";

import React, { useState } from "react";
import { Row, Col } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";

const categoriesData = [
  {
    name: "All",
    icon: "/images/all-icon.svg",
    products: [
      {
        id: 1,
        name: "Apple iPhone 16",
        category: "Smartphones",
        price: "$799",
        image: "/images/product-36.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 2,
        name: "Levi's 501",
        category: "Pants",
        price: "$89",
        image: "/images/product-37.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 3,
        name: "Maybelline Lash",
        category: "Makeup",
        price: "$29",
        image: "/images/product-38.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 4,
        name: "Samsung TV",
        category: "Television",
        price: "$999",
        image: "/images/product-39.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 5,
        name: "Nike Shoes",
        category: "Footwear",
        price: "$120",
        image: "/images/product-40.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 6,
        name: "L'Oreal Lipstick",
        category: "Cosmetics",
        price: "$19",
        image: "/images/product-41.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 7,
        name: "Organic Honey",
        category: "Food & Beverages",
        price: "$15",
        image: "/images/product-42.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 8,
        name: "Sony Headphones",
        category: "Audio",
        price: "$199",
        image: "/images/product-43.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 9,
        name: "Gaming Mouse",
        category: "Accessories",
        price: "$59",
        image: "/images/product-44.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 10,
        name: "Leather Wallet",
        category: "Fashion",
        price: "$39",
        image: "/images/product-37.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 11,
        name: "Wireless Keyboard",
        category: "Electronics",
        price: "$89",
        image: "/images/product-38.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 12,
        name: "Digital Watch",
        category: "Wearable",
        price: "$149",
        image: "/images/product-39.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 13,
        name: "Running Shoes",
        category: "Sports",
        price: "$110",
        image: "/images/product-40.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 14,
        name: "Perfume Set",
        category: "Beauty",
        price: "$79",
        image: "/images/product-41.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 15,
        name: "Candle Set",
        category: "Home Decor",
        price: "$29",
        image: "/images/product-42.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 16,
        name: "Smart Home Hub",
        category: "Electronics",
        price: "$149",
        image: "/images/product-43.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 17,
        name: "Bluetooth Speaker",
        category: "Audio",
        price: "$129",
        image: "/images/product-44.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 18,
        name: "Action Camera",
        category: "Photography",
        price: "$299",
        image: "/images/product-37.png",
        viewLink: "/ecommerce/product-details/",
      },
    ],
  },
  {
    name: "Electronics",
    icon: "/images/electronics-icon2.svg",
    products: [
      {
        id: 19,
        name: "Samsung TV",
        category: "Television",
        price: "$999",
        image: "/images/product-39.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 20,
        name: "Apple iPhone 16",
        category: "Smartphones",
        price: "$799",
        image: "/images/product-36.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 21,
        name: "Levi's 501",
        category: "Pants",
        price: "$89",
        image: "/images/product-37.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 22,
        name: "Maybelline Lash",
        category: "Makeup",
        price: "$29",
        image: "/images/product-38.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 23,
        name: "Samsung TV",
        category: "Television",
        price: "$999",
        image: "/images/product-39.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 24,
        name: "Nike Shoes",
        category: "Footwear",
        price: "$120",
        image: "/images/product-40.png",
        viewLink: "/ecommerce/product-details/",
      },
    ],
  },
  {
    name: "Clothing",
    icon: "/images/clothing-icon2.svg",
    products: [
      {
        id: 25,
        name: "Nike Shoes",
        category: "Footwear",
        price: "$120",
        image: "/images/product-40.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 26,
        name: "Running Shoes",
        category: "Sports",
        price: "$110",
        image: "/images/product-40.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 27,
        name: "Perfume Set",
        category: "Beauty",
        price: "$79",
        image: "/images/product-41.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 28,
        name: "Candle Set",
        category: "Home Decor",
        price: "$29",
        image: "/images/product-42.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 29,
        name: "Smart Home Hub",
        category: "Electronics",
        price: "$149",
        image: "/images/product-43.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 30,
        name: "Bluetooth Speaker",
        category: "Audio",
        price: "$129",
        image: "/images/product-44.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 31,
        name: "Action Camera",
        category: "Photography",
        price: "$299",
        image: "/images/product-37.png",
        viewLink: "/ecommerce/product-details/",
      },
    ],
  },
  {
    name: "Beauty",
    icon: "/images/beauty-icon.svg",
    products: [
      {
        id: 32,
        name: "L'Oreal Lipstick",
        category: "Cosmetics",
        price: "$19",
        image: "/images/product-41.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 33,
        name: "Samsung TV",
        category: "Television",
        price: "$999",
        image: "/images/product-39.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 34,
        name: "Nike Shoes",
        category: "Footwear",
        price: "$120",
        image: "/images/product-40.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 35,
        name: "L'Oreal Lipstick",
        category: "Cosmetics",
        price: "$19",
        image: "/images/product-41.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 36,
        name: "Organic Honey",
        category: "Food & Beverages",
        price: "$15",
        image: "/images/product-42.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 37,
        name: "Sony Headphones",
        category: "Audio",
        price: "$199",
        image: "/images/product-43.png",
        viewLink: "/ecommerce/product-details/",
      },
    ],
  },
  {
    name: "Foods",
    icon: "/images/foods-icon.svg",
    products: [
      {
        id: 38,
        name: "Organic Honey",
        category: "Food & Beverages",
        price: "$15",
        image: "/images/product-42.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 39,
        name: "Sony Headphones",
        category: "Audio",
        price: "$199",
        image: "/images/product-43.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 40,
        name: "Gaming Mouse",
        category: "Accessories",
        price: "$59",
        image: "/images/product-44.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 41,
        name: "Leather Wallet",
        category: "Fashion",
        price: "$39",
        image: "/images/product-37.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 42,
        name: "Wireless Keyboard",
        category: "Electronics",
        price: "$89",
        image: "/images/product-38.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 43,
        name: "Digital Watch",
        category: "Wearable",
        price: "$149",
        image: "/images/product-39.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 44,
        name: "Running Shoes",
        category: "Sports",
        price: "$110",
        image: "/images/product-40.png",
        viewLink: "/ecommerce/product-details/",
      },
      {
        id: 45,
        name: "Perfume Set",
        category: "Beauty",
        price: "$79",
        image: "/images/product-41.png",
        viewLink: "/ecommerce/product-details/",
      },
    ],
  },
];

const PRODUCTS_PER_PAGE = 9; // Number of products to show per page

const Categories = () => {
  const [activeTab, setActiveTab] = useState(0);
  const [currentPage, setCurrentPage] = useState(1);

  const currentCategory = categoriesData[activeTab];
  const totalProducts = currentCategory.products.length;
  const totalPages = Math.ceil(totalProducts / PRODUCTS_PER_PAGE);

  // Slice products based on current page
  const startIndex = (currentPage - 1) * PRODUCTS_PER_PAGE;
  const paginatedProducts = currentCategory.products.slice(
    startIndex,
    startIndex + PRODUCTS_PER_PAGE
  );

  // Handle page change
  const changePage = (newPage) => {
    if (newPage > 0 && newPage <= totalPages) {
      setCurrentPage(newPage);
    }
  };

  return (
    <>
      <h3 className="fs-20 fw-medium mb-4">Categories</h3>

      <ul className="nav nav-tabs border-0 mb-4 gap-3 categories-tabs">
        {categoriesData.map((category, index) => (
          <li className="nav-item" key={index}>
            <button
              onClick={() => setActiveTab(index)}
              className={`bg-white nav-link border-2 rounded-3 ${
                activeTab === index ? "active" : ""
              }`}
              style={{
                width: "125px",
                padding: "20px",
                paddingBottom: "16px",
              }}
            >
              <Image
                src={category.icon}
                className="mb-3"
                alt={category.name}
                width={40}
                height={40}
              />
              <h4 className="fs-16 fw-medium d-block mb-0">{category.name}</h4>
              <span className="fs-12 fw-medium text-body">
                {category.products.length}{" "}
                <span className="d-none">Products</span>
              </span>
            </button>
          </li>
        ))}
      </ul>

      <div>
        <Row>
          {paginatedProducts.map((product) => (
            <Col md={4} sm={6} key={product.id}>
              <div className="card custom-shadow rounded-3 border mb-4 bg-white p-20">
                <div className="pb-1">
                  <Link
                    href={product.viewLink}
                    className="d-block text-decoration-none mb-2"
                  >
                    <Image
                      src={product.image}
                      className="rounded-2 mb-3"
                      alt={product.name}
                      width={570}
                      height={402}
                    />
                    <h3 className="fs-20 fw-medium mb-1">{product.name}</h3>
                    <span className="text-body">{product.category}</span>
                  </Link>

                  <div className="d-flex justify-content-between align-items-end">
                    <span className="fs-24 fw-medium text-success-60 lh-1 position-relative top-3">
                      {product.price}
                    </span>
                    <button
                      className="rounded-1 border-0 p-0 text-center text-primary fs-24"
                      style={{
                        backgroundColor: "#DDE4FF",
                        width: "35px",
                        height: "35px",
                        lineHeight: "35px",
                      }}
                    >
                      <i className="ri-shopping-cart-fill"></i>
                    </button>
                  </div>
                </div>
              </div>
            </Col>
          ))}
        </Row>

        {/* Pagination */}
        {totalPages > 1 && (
          <div
            className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap custom-shadow for-dark-rounded-bg rounded-3 border bg-white px-4 mb-4"
            style={{ paddingTop: "11px", paddingBottom: "11px" }}
          >
            <span className="fs-12 fw-medium">
              Showing {paginatedProducts.length} of {totalProducts} Products
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li
                  className={`page-item ${currentPage === 1 ? "disabled" : ""}`}
                >
                  <button
                    className="page-link icon hover-bg"
                    aria-label="Previous"
                    onClick={() => changePage(currentPage - 1)}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </button>
                </li>

                {/* Dynamic Page Numbers */}
                {[...Array(totalPages)].map((_, index) => (
                  <li key={index} className="page-item">
                    <button
                      className={`page-link ${
                        currentPage === index + 1 ? "active" : ""
                      }`}
                      onClick={() => changePage(index + 1)}
                    >
                      {index + 1}
                    </button>
                  </li>
                ))}

                <li
                  className={`page-item ${
                    currentPage === totalPages ? "disabled" : ""
                  }`}
                >
                  <button
                    className="page-link icon hover-bg"
                    aria-label="Next"
                    onClick={() => changePage(currentPage + 1)}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_right
                    </i>
                  </button>
                </li>
              </ul>
            </nav>
          </div>
        )}
      </div>
    </>
  );
};

export default Categories;

"use client";

import { useState } from "react";
import { Row, Col, Card, Form } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const productData = [
  {
    id: 1,
    name: 'Apple MacBook Pro 16.2" with M3 Pro Chip',
    viewLink: "/ecommerce/product-details",
    price: 3479,
    oldPrice: 3599,
    image: "/images/product-6.jpg",
    rating: 5,
  },
  {
    id: 2,
    name: "SAMSUNG Galaxy Tab A9+ Tablet 11”",
    viewLink: "/ecommerce/product-details",
    price: 549,
    oldPrice: 649,
    image: "/images/product-7.jpg",
    rating: 4.5,
  },
  {
    id: 3,
    name: "Apple iPhone 15 Pro Max (512 GB)",
    viewLink: "/ecommerce/product-details",
    price: 1479,
    oldPrice: 1599,
    image: "/images/product-8.jpg",
    rating: 4,
  },
  {
    id: 4,
    name: "Gildan Men's Crew T-Shirts, Multipack",
    viewLink: "/ecommerce/product-details",
    price: 79,
    oldPrice: 89,
    image: "/images/product-9.jpg",
    rating: 5,
  },
  {
    id: 5,
    name: "Skechers Men's Summits High Range",
    viewLink: "/ecommerce/product-details",
    price: 849,
    oldPrice: 999,
    image: "/images/product-10.jpg",
    rating: 3.5,
  },
  {
    id: 6,
    name: "Amazfit GTR 3 Smart Watch for Men",
    viewLink: "/ecommerce/product-details",
    price: 49,
    oldPrice: 69,
    image: "/images/product-11.jpg",
    rating: 5,
  },
  {
    id: 7,
    name: "SOJOS Small Round Polarized Sunglasses",
    viewLink: "/ecommerce/product-details",
    price: 39,
    oldPrice: 49,
    image: "/images/product-12.jpg",
    rating: 4.5,
  },
  {
    id: 8,
    name: "Nautical Clock Ship Table Clock Brass Desk",
    viewLink: "/ecommerce/product-details",
    price: 25,
    oldPrice: 39,
    image: "/images/product-13.jpg",
    rating: 4,
  },
  {
    id: 9,
    name: "Carhartt, Durable, Adjustable Crossbody Bag",
    viewLink: "/ecommerce/product-details",
    price: 149,
    oldPrice: 299,
    image: "/images/product-14.jpg",
    rating: 5,
  },
];

const ITEMS_PER_PAGE = 6;

const ProductsGrid = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [searchQuery, setSearchQuery] = useState("");

  const filteredProducts = productData.filter((product) =>
    product.name.toLowerCase().includes(searchQuery.toLowerCase())
  );

  const totalPages = Math.ceil(filteredProducts.length / ITEMS_PER_PAGE);

  // Get products for the current page
  const currentProducts = filteredProducts.slice(
    (currentPage - 1) * ITEMS_PER_PAGE,
    currentPage * ITEMS_PER_PAGE
  );

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-sm-flex justify-content-between align-items-center flex-wrap gap-2">
            <h4 className="fs-16 fw-medium mb-2 mb-sm-0">Filter</h4>

            <Form className="default-src-form">
              <div className="d-sm-flex flex-wrap gap-3">
                <div className="position-relative mb-2 mb-sm-0">
                  <Form.Control
                    type="text"
                    className="rounded-1"
                    placeholder="Search here"
                    value={searchQuery}
                    onChange={(e) => {
                      setSearchQuery(e.target.value);
                      setCurrentPage(1); // Reset to first page on search
                    }}
                  />

                  <span className="material-symbols-outlined fs-18 position-absolute top-50 start-0 translate-middle-y">
                    search
                  </span>
                </div>

                <div>
                  <Form.Select
                    className="form-control rounded-1 py-0 fs-14 ps-3 bg-transparent pe-5"
                    aria-label="Default select example"
                  >
                    <option defaultValue="0">Default Shorting</option>
                    <option defaultValue="1">Apple</option>
                    <option defaultValue="2">SAMSUNG</option>
                    <option defaultValue="3">T-Shirts</option>
                  </Form.Select>
                </div>
              </div>
            </Form>
          </div>
        </Card.Body>
      </Card>

      <Row className="justify-content-center">
        {currentProducts.length > 0 ? (
          currentProducts.map((product) => (
            <Col key={product.id} sm={6} lg={4}>
              <div className="mb-4 transition-y">
                <div className="position-relative mb-3">
                  <Link href={product.viewLink}>
                    <Image
                      src={product.image}
                      className="rounded-3"
                      alt={product.name}
                      width={1070}
                      height={1070}
                    />
                  </Link>

                  <button
                    type="button"
                    className="bg-body-bg bg-for-dark-mode pt-2 ps-2 position-absolute bottom-0 end-0 rounded-3 rounded-bottom-0 rounded-end-0 border-0"
                  >
                    <span className="material-symbols-outlined fs-24 wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3">
                      shopping_cart
                    </span>
                  </button>
                </div>

                <Link
                  href={product.viewLink}
                  className="text-secondary text-decoration-none fs-16 hover d-block mb-4"
                >
                  {product.name}
                </Link>

                <div className="d-flex justify-content-between align-items-center">
                  <h2 className="fs-20 mb-0">
                    ${product.price}{" "}
                    <del className="fs-16 fw-normal">${product.oldPrice}</del>
                  </h2>
                  <div className="d-flex flex-wrap gap-1">
                    {[...Array(5)].map((_, i) => (
                      <i
                        key={i}
                        className={`ri-star-${
                          i + 1 <= Math.floor(product.rating)
                            ? "fill"
                            : i < product.rating
                            ? "half-fill"
                            : "line"
                        } fs-16 text-warning`}
                      ></i>
                    ))}
                  </div>
                </div>
              </div>
            </Col>
          ))
        ) : (
          <p className="text-center">No products found</p>
        )}

        {/* Pagination */}
        {filteredProducts.length > ITEMS_PER_PAGE && (
          <Col sm={12} lg={12}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                  <span className="fs-12 fw-medium">
                    Showing {currentProducts.length} of{" "}
                    {filteredProducts.length} Products
                  </span>

                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <button
                          className={`page-link icon ${
                            currentPage === 1 ? "disabled" : ""
                          }`}
                          onClick={() =>
                            setCurrentPage((prev) => Math.max(prev - 1, 1))
                          }
                        >
                          <span className="material-symbols-outlined fs-24">
                            keyboard_arrow_left
                          </span>
                        </button>
                      </li>

                      {[...Array(totalPages)].map((_, index) => (
                        <li key={index} className="page-item">
                          <button
                            className={`page-link ${
                              currentPage === index + 1 ? "active" : ""
                            }`}
                            onClick={() => setCurrentPage(index + 1)}
                          >
                            {index + 1}
                          </button>
                        </li>
                      ))}

                      <li className="page-item">
                        <button
                          className={`page-link icon ${
                            currentPage === totalPages ? "disabled" : ""
                          }`}
                          onClick={() =>
                            setCurrentPage((prev) =>
                              Math.min(prev + 1, totalPages)
                            )
                          }
                        >
                          <span className="material-symbols-outlined fs-24">
                            keyboard_arrow_right
                          </span>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </div>
              </Card.Body>
            </Card>
          </Col>
        )}
      </Row>
    </>
  );
};

export default ProductsGrid;

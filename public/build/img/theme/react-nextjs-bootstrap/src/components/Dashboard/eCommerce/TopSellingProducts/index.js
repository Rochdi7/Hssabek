"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const topSellingProductsData = [
  {
    product: {
      img: "/images/product-1.jpg",
      title: "Smart Band",
      detailsLink: "/ecommerce/product-details/",
      date: "08 Jun 2024",
    },
    price: "$35.00",
    order: 75,
    stock: "750",
    amount: "$2,625",
  },
  {
    product: {
      img: "/images/product-2.jpg",
      title: "Headphone",
      detailsLink: "/ecommerce/product-details/",
      date: "07 Jun 2024",
    },
    price: "$49.00",
    order: 25,
    stock: "825",
    amount: "$1,225",
  },
  {
    product: {
      img: "/images/product-3.jpg",
      title: "iPhone 15 Plus",
      detailsLink: "/ecommerce/product-details/",
      date: "06 Jun 2024",
    },
    price: "$99.00",
    order: 55,
    stock: "Stock Out",
    amount: "$5,445",
  },
  {
    product: {
      img: "/images/product-4.jpg",
      title: "Bluetooth Speaker",
      detailsLink: "/ecommerce/product-details/",
      date: "05 Jun 2024",
    },
    price: "$59.00",
    order: 40,
    stock: "535",
    amount: "$2,360",
  },
  {
    product: {
      img: "/images/product-5.jpg",
      title: "Airbuds 2nd Gen",
      detailsLink: "/ecommerce/product-details/",
      date: "04 Jun 2024",
    },
    price: "$79.00",
    order: 56,
    stock: "460",
    amount: "$4,424",
  },

  {
    product: {
      img: "/images/product-2.jpg",
      title: "Headphone",
      detailsLink: "/ecommerce/product-details/",
      date: "07 Jun 2024",
    },
    price: "$49.00",
    order: 25,
    stock: "825",
    amount: "$1,225",
  },
  {
    product: {
      img: "/images/product-4.jpg",
      title: "Bluetooth Speaker",
      detailsLink: "/ecommerce/product-details/",
      date: "05 Jun 2024",
    },
    price: "$59.00",
    order: 40,
    stock: "535",
    amount: "$2,360",
  },
  {
    product: {
      img: "/images/product-1.jpg",
      title: "Smart Band",
      detailsLink: "/ecommerce/product-details/",
      date: "08 Jun 2024",
    },
    price: "$35.00",
    order: 75,
    stock: "750",
    amount: "$2,625",
  },
  {
    product: {
      img: "/images/product-5.jpg",
      title: "Airbuds 2nd Gen",
      detailsLink: "/ecommerce/product-details/",
      date: "04 Jun 2024",
    },
    price: "$79.00",
    order: 56,
    stock: "460",
    amount: "$4,424",
  },
  {
    product: {
      img: "/images/product-3.jpg",
      title: "iPhone 15 Plus",
      detailsLink: "/ecommerce/product-details/",
      date: "06 Jun 2024",
    },
    price: "$99.00",
    order: 55,
    stock: "Stock Out",
    amount: "$5,445",
  },
];

const TopSellingProducts = () => {
  // Pagination state
  const itemsPerPage = 5; // Set the number of items per page
  const [currentPage, setCurrentPage] = useState(1);

  // Calculate the starting and ending indices for pagination
  const startIdx = (currentPage - 1) * itemsPerPage;
  const endIdx = startIdx + itemsPerPage;
  const paginatedData = topSellingProductsData.slice(startIdx, endIdx);

  // Calculate total pages
  const totalPages = Math.ceil(topSellingProductsData.length / itemsPerPage);

  // Handle page changes
  const handlePageChange = (newPage) => {
    setCurrentPage(newPage);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Top Selling Products</h3>
            <Form.Select
              className="month-select form-control"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">Today</option>
              <option defaultValue="2">Weekly</option>
              <option defaultValue="3">Monthly</option>
              <option defaultValue="4">Yearly</option>
            </Form.Select>
          </div>

          <div className="default-table-area top-selling-products">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  {paginatedData.map((item, i) => (
                    <tr key={i}>
                      <td>
                        <Link
                          href={item.product.detailsLink}
                          className="d-flex align-items-center"
                        >
                          <Image
                            src={item.product.img}
                            className="wh-40 rounded-3"
                            alt={item.product.title}
                            width={40}
                            height={40}
                          />
                          <div className="ms-2 ps-1">
                            <h6 className="fw-medium fs-14">
                              {item.product.title}
                            </h6>
                            <span className="fs-12 text-body">
                              {item.product.date}
                            </span>
                          </div>
                        </Link>
                      </td>
                      <td>{item.price}</td>
                      <td>{item.order}</td>
                      <td>{item.stock}</td>
                      <td>{item.amount}</td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
              <span className="fs-12 fw-medium">
                Showing {startIdx + 1} to{" "}
                {Math.min(endIdx, topSellingProductsData.length)} of{" "}
                {topSellingProductsData.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li
                    className={`page-item ${
                      currentPage === 1 ? "disabled" : ""
                    }`}
                  >
                    <Button
                      className="page-link icon"
                      onClick={() => handlePageChange(currentPage - 1)}
                      disabled={currentPage === 1}
                    > 
                      <i className="material-symbols-outlined">keyboard_arrow_left</i>
                    </Button>
                  </li>
                  {[...Array(totalPages)].map((_, index) => (
                    <li key={index} className="page-item">
                      <Button
                        className={`page-link ${
                          currentPage === index + 1 ? "active" : ""
                        }`}
                        onClick={() => handlePageChange(index + 1)}
                      >
                        {index + 1}
                      </Button>
                    </li>
                  ))}
                  <li
                    className={`page-item ${
                      currentPage === totalPages ? "disabled" : ""
                    }`}
                  >
                    <Button
                      className="page-link icon"
                      onClick={() => handlePageChange(currentPage + 1)}
                      disabled={currentPage === totalPages}
                    > 
                      <i className="material-symbols-outlined">keyboard_arrow_right</i>
                    </Button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TopSellingProducts;

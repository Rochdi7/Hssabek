"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const recentOrdersData = [
  {
    orderID: "#JAN-2345",
    customer: {
      img: "/images/user-1.jpg",
      name: "Sarah Johnson",
    },
    created: "12 Jun 2024",
    total: "$10,490",
    status: "shipped",
  },
  {
    orderID: "#JAN-1323",
    customer: {
      img: "/images/user-2.jpg",
      name: "Michael Smith",
    },
    created: "11 Jun 2024",
    total: "$6,575",
    status: "confirmed",
  },
  {
    orderID: "#DEC-1234",
    customer: {
      img: "/images/user-3.jpg",
      name: "Emily Brown",
    },
    created: "10 Jun 2024",
    total: "$12,870",
    status: "pending",
  },
  {
    orderID: "#DEC-3567",
    customer: {
      img: "/images/user-4.jpg",
      name: "Jason Lee",
    },
    created: "09 Jun 2024",
    total: "$7,895",
    status: "shipped",
  },
  {
    orderID: "#DEC-1098",
    customer: {
      img: "/images/user-5.jpg",
      name: "Ashley Davis",
    },
    created: "08 Jun 2024",
    total: "$4,680",
    status: "rejected",
  },
  {
    orderID: "#JAN-2345",
    customer: {
      img: "/images/user-1.jpg",
      name: "Sarah Johnson",
    },
    created: "12 Jun 2024",
    total: "$10,490",
    status: "shipped",
  },
  {
    orderID: "#DEC-1234",
    customer: {
      img: "/images/user-3.jpg",
      name: "Emily Brown",
    },
    created: "10 Jun 2024",
    total: "$12,870",
    status: "pending",
  },
  {
    orderID: "#JAN-1323",
    customer: {
      img: "/images/user-2.jpg",
      name: "Michael Smith",
    },
    created: "11 Jun 2024",
    total: "$6,575",
    status: "confirmed",
  },
  {
    orderID: "#DEC-1098",
    customer: {
      img: "/images/user-5.jpg",
      name: "Ashley Davis",
    },
    created: "08 Jun 2024",
    total: "$4,680",
    status: "rejected",
  },
  {
    orderID: "#DEC-3567",
    customer: {
      img: "/images/user-4.jpg",
      name: "Jason Lee",
    },
    created: "09 Jun 2024",
    total: "$7,895",
    status: "shipped",
  },
];

const itemsPerPage = 5;

const RecentOrders = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [searchTerm, setSearchTerm] = useState("");

  // Filter data based on the search term
  const filteredData = recentOrdersData.filter(
    (order) =>
      order.orderID.toLowerCase().includes(searchTerm.toLowerCase()) ||
      order.customer.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
      order.status.toLowerCase().includes(searchTerm.toLowerCase())
  );

  // Calculate total pages based on filtered data length
  const totalPages = Math.ceil(filteredData.length / itemsPerPage);

  // Get current data slice for the page
  const currentData = filteredData.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  // Pagination functions
  const handlePrevPage = () => {
    setCurrentPage((prev) => Math.max(prev - 1, 1));
  };

  const handleNextPage = () => {
    setCurrentPage((prev) => Math.min(prev + 1, totalPages));
  };

  // Reset page when search term changes
  const handleSearchChange = (event) => {
    setSearchTerm(event.target.value);
    setCurrentPage(1);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Recent Orders</h3>

            <div className="d-flex">
              <Form className="position-relative table-src-form">
                <Form.Control
                  type="text"
                  placeholder="Search here"
                  value={searchTerm}
                  onChange={handleSearchChange}
                />
                <i className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                  search
                </i>
              </Form>

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
          </div>

          <div className="default-table-area recent-orders">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Created</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  {currentData.map((order, i) => (
                    <tr key={i}>
                      <td>{order.orderID}</td>
                      <td>
                        <Link
                          href="/my-profile"
                          className="d-flex align-items-center"
                        >
                          <Image
                            src={order.customer.img}
                            className="wh-40 rounded-3"
                            alt="user"
                            width={40}
                            height={40}
                          />
                          <div className="ms-2 ps-1">
                            <h6 className="fw-medium fs-14">
                              {order.customer.name}
                            </h6>
                          </div>
                        </Link>
                      </td>
                      <td>{order.created}</td>
                      <td>{order.total}</td>
                      <td>
                        <span
                          className={`badge p-2 fs-12 fw-normal text-capitalize ${order.status}`}
                        >
                          {order.status}
                        </span>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
              <span className="fs-12 fw-medium">
                Showing {currentData.length} of {recentOrdersData.length}{" "}
                Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={handlePrevPage}
                      disabled={currentPage === 1}
                    > 
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  {[...Array(totalPages)].map((_, index) => (
                    <li key={index} className="page-item">
                      <Button
                        className={`page-link ${
                          currentPage === index + 1 ? "active" : ""
                        }`}
                        onClick={() => setCurrentPage(index + 1)}
                      >
                        {index + 1}
                      </Button>
                    </li>
                  ))}
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={handleNextPage}
                      disabled={currentPage === totalPages}
                    > 
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
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

export default RecentOrders;

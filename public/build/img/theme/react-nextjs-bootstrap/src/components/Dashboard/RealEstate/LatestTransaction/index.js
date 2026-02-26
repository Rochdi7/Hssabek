"use client";

import React, { useState } from "react";
import { Card, Table, Button, Form } from "react-bootstrap";
import Image from "next/image";

const transactionData = [
  {
    id: "#TRE0015",
    name: "Sarah Johnson",
    property: "Industrial",
    date: "2024-10-01",
    price: "$500,000",
    status: "Completed",
    payment: "Master Card",
    imageUrl: "/images/user-1.jpg",
  },
  {
    id: "#TRE0016",
    name: "Michael Smith",
    property: "Office",
    date: "2024-09-28",
    price: "$1,200,000",
    status: "Pending",
    payment: "Paypal",
    imageUrl: "/images/user-2.jpg",
  },
  {
    id: "#TRE0017",
    name: "Emily Brown",
    property: "Multi-Family",
    date: "2024-09-25",
    price: "$350,000",
    status: "Cancel",
    payment: "Wise",
    imageUrl: "/images/user-3.jpg",
  },
  {
    id: "#TRE0018",
    name: "Jason Lee",
    property: "Residential",
    date: "2024-09-22",
    price: "$220,000",
    status: "Completed",
    payment: "Payoneer",
    imageUrl: "/images/user-4.jpg",
  },
  {
    id: "#TRE0019",
    name: "Ashley Davis",
    property: "Residential",
    date: "2024-09-20",
    price: "$1,500,000",
    status: "Rejected",
    payment: "Credit Card",
    imageUrl: "/images/user-5.jpg",
  },
  {
    id: "#TRE0020",
    name: "Johnson Lara",
    property: "Industrial",
    date: "2024-10-01",
    price: "$500,000",
    status: "Completed",
    payment: "Master Card",
    imageUrl: "/images/user-6.jpg",
  },
  {
    id: "#TRE0021",
    name: "Smith Tom",
    property: "Office",
    date: "2024-09-28",
    price: "$1,200,000",
    status: "Pending",
    payment: "Paypal",
    imageUrl: "/images/user-7.jpg",
  },
  {
    id: "#TRE0022",
    name: "Emily Le",
    property: "Multi-Family",
    date: "2024-09-25",
    price: "$350,000",
    status: "Cancel",
    payment: "Wise",
    imageUrl: "/images/user-8.jpg",
  },
  {
    id: "#TRE0023",
    name: "Tomlee",
    property: "Residential",
    date: "2024-09-22",
    price: "$220,000",
    status: "Completed",
    payment: "Payoneer",
    imageUrl: "/images/user-9.jpg",
  },
  {
    id: "#TRE0024",
    name: "Ashley Me",
    property: "Residential",
    date: "2024-09-20",
    price: "$1,500,000",
    status: "Rejected",
    payment: "Credit Card",
    imageUrl: "/images/user-10.jpg",
  },
];

const itemsPerPage = 5;

const LatestTransaction = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [selectedTransactions, setSelectedTransactions] = useState([]);
  const [selectAll, setSelectAll] = useState(false);

  // Calculate total pages based on the filtered data length
  const totalPages = Math.ceil(transactionData.length / itemsPerPage);

  // Get current data slice for the page
  const currentData = transactionData.slice(
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

  const handleSelectAll = (event) => {
    if (event.target.checked) {
      setSelectedTransactions(currentData.map((transaction) => transaction.id));
    } else {
      setSelectedTransactions([]);
    }
    setSelectAll(event.target.checked);
  };

  const handleSelectTransaction = (transactionId) => {
    if (selectedTransactions.includes(transactionId)) {
      setSelectedTransactions((prev) =>
        prev.filter((id) => id !== transactionId)
      );
    } else {
      setSelectedTransactions((prev) => [...prev, transactionId]);
    }
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-0">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
          <h3 className="mb-0">Latest Transaction</h3>

          <Form.Select className="month-select form-control w-135 bg-border-color border-color bg-transparent">
            <option value="0">Last 30 days</option>
            <option value="1">Last 90 days</option>
            <option value="2">Last 1 year</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-two latest-transaction">
          <div className="table-responsive">
            <Table className="align-middle">
              <thead>
                <tr>
                  <th scope="col">
                    <div className="d-flex align-items-center">
                      <div className="form-check">
                        <input
                          className="form-check-input"
                          type="checkbox"
                          id="selectAll"
                          checked={selectAll}
                          onChange={handleSelectAll}
                        />
                      </div>
                      <span className="ms-1">Customer ID</span>
                    </div>
                  </th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Property</th>
                  <th scope="col">Date</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                  <th scope="col">Payment</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                {currentData.map((transaction, i) => (
                  <tr key={i}>
                    <td>
                      <div className="d-flex align-items-center">
                        <div className="form-check">
                          <input
                            className="form-check-input"
                            type="checkbox"
                            value={transaction.id}
                            checked={selectedTransactions.includes(
                              transaction.id
                            )}
                            onChange={() =>
                              handleSelectTransaction(transaction.id)
                            }
                          />
                        </div>
                        <span className="ms-1 text-secondary">
                          {transaction.id}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src={transaction.imageUrl}
                          className="rounded-2"
                          alt="user"
                          width={44}
                          height={44}
                        />
                        <div className="ms-2">
                          <h6 className="fw-medium fs-14 m-0">
                            {transaction.name}
                          </h6>
                        </div>
                      </div>
                    </td>
                    <td>{transaction.property}</td>
                    <td>{transaction.date}</td>
                    <td>{transaction.price}</td>
                    <td>
                      <span
                        className={`badge ${
                          transaction.status === "Completed"
                            ? "bg-success bg-opacity-10 text-success"
                            : transaction.status === "Pending"
                            ? "bg-warning bg-opacity-10 text-warning"
                            : "bg-danger bg-opacity-10 text-danger"
                        } p-2 fs-12 fw-normal`}
                      >
                        {transaction.status}
                      </span>
                    </td>
                    <td>{transaction.payment}</td>
                    <td>
                      <div className="d-flex align-items-center gap-1">
                        <button className="ps-0 border-0 bg-transparent lh-1">
                          <i className="material-symbols-outlined fs-16 text-primary">
                            visibility
                          </i>
                        </button>
                        <button className="ps-0 border-0 bg-transparent lh-1">
                          <i className="material-symbols-outlined fs-16 text-body">
                            edit
                          </i>
                        </button>
                        <button className="ps-0 border-0 bg-transparent lh-1">
                          <i className="material-symbols-outlined fs-16 text-danger">
                            delete
                          </i>
                        </button>
                      </div>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
            <span className="fs-12 fw-medium">
              Showing {currentData.length} of {transactionData.length} Results
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
  );
};

export default LatestTransaction;

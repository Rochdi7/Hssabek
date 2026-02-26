"use client";

import { useState } from "react";
import { Card, Table, Button, Form } from "react-bootstrap";
import AddANewTransaction from "./AddANewTransaction";

const TransactionHistory = () => {
  // Transactions data
  const allTransactions = [
    {
      id: "#TID0015",
      date: "2024-10-01",
      description: "Payment from Client",
      amount: "$5,000",
      type: "Income",
      status: "Completed",
    },
    {
      id: "#TID0099",
      date: "2024-09-28",
      description: "Office Supplies",
      amount: "$10,000",
      type: "Expense",
      status: "Pending",
    },
    {
      id: "#TID0145",
      date: "2024-09-25",
      description: "Website Maintenance",
      amount: "$35,000",
      type: "Expense",
      status: "Pending",
    },
    {
      id: "#TID0247",
      date: "2024-09-22",
      description: "Payment from Client",
      amount: "$2,000",
      type: "Income",
      status: "Completed",
    },
    {
      id: "#TID0299",
      date: "2024-09-20",
      description: "Advertising Campaign",
      amount: "$15,500",
      type: "Expense",
      status: "Completed",
    },
    {
      id: "#TID0312",
      date: "2024-09-12",
      description: "Office Renovation",
      amount: "$4,000",
      type: "Expense",
      status: "Completed",
    },
    {
      id: "#TID0320",
      date: "2024-09-10",
      description: "Payment from Client",
      amount: "$3,000",
      type: "Income",
      status: "Completed",
    },
    {
      id: "#TID0351",
      date: "2024-09-08",
      description: "Marketing Campaign",
      amount: "$1,500",
      type: "Expense",
      status: "Pending",
    },
    {
      id: "#TID0360",
      date: "2024-09-05",
      description: "Payment from Client",
      amount: "$6,500",
      type: "Income",
      status: "Completed",
    },
    {
      id: "#TID0365",
      date: "2024-09-01",
      description: "Software Subscription",
      amount: "$400",
      type: "Expense",
      status: "Completed",
    },
    {
      id: "#TID0365",
      date: "2024-09-01",
      description: "Software Subscription",
      amount: "$400",
      type: "Expense",
      status: "Completed",
    },
    {
      id: "#TID0099",
      date: "2024-09-28",
      description: "Office Supplies",
      amount: "$10,000",
      type: "Expense",
      status: "Pending",
    },
    {
      id: "#TID0145",
      date: "2024-09-25",
      description: "Website Maintenance",
      amount: "$35,000",
      type: "Expense",
      status: "Pending",
    },
    {
      id: "#TID0247",
      date: "2024-09-22",
      description: "Payment from Client",
      amount: "$2,000",
      type: "Income",
      status: "Completed",
    },
    {
      id: "#TID0015",
      date: "2024-10-01",
      description: "Payment from Client",
      amount: "$5,000",
      type: "Income",
      status: "Completed",
    },
    {
      id: "#TID0299",
      date: "2024-09-20",
      description: "Advertising Campaign",
      amount: "$15,500",
      type: "Expense",
      status: "Completed",
    },
    {
      id: "#TID0312",
      date: "2024-09-12",
      description: "Office Renovation",
      amount: "$4,000",
      type: "Expense",
      status: "Completed",
    },
    {
      id: "#TID0351",
      date: "2024-09-08",
      description: "Marketing Campaign",
      amount: "$1,500",
      type: "Expense",
      status: "Pending",
    },
    {
      id: "#TID0320",
      date: "2024-09-10",
      description: "Payment from Client",
      amount: "$3,000",
      type: "Income",
      status: "Completed",
    },
    {
      id: "#TID0360",
      date: "2024-09-05",
      description: "Payment from Client",
      amount: "$6,500",
      type: "Income",
      status: "Completed",
    },
  ];

  // Pagination state
  const [currentPage, setCurrentPage] = useState(1);
  const transactionsPerPage = 10;

  // Checkbox state
  const [selectedRows, setSelectedRows] = useState([]);

  // Calculate indices for pagination
  const indexOfLastTransaction = currentPage * transactionsPerPage;
  const indexOfFirstTransaction = indexOfLastTransaction - transactionsPerPage;
  const currentTransactions = allTransactions.slice(
    indexOfFirstTransaction,
    indexOfLastTransaction
  );

  const totalPages = Math.ceil(allTransactions.length / transactionsPerPage);

  // Change page handler
  const paginate = (pageNumber) => setCurrentPage(pageNumber);

  // Checkbox handlers
  const handleSelectAll = (e) => {
    if (e.target.checked) {
      setSelectedRows(currentTransactions.map((transaction) => transaction.id));
    } else {
      setSelectedRows([]);
    }
  };

  const handleRowSelect = (id) => {
    if (selectedRows.includes(id)) {
      setSelectedRows(selectedRows.filter((rowId) => rowId !== id));
    } else {
      setSelectedRows([...selectedRows, id]);
    }
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
            <h3 className="mb-0">Transaction History</h3>

            <div className="d-flex flex-wrap gap-2">
              <AddANewTransaction />

              <Form.Select
                className="month-select form-control w-135 bg-border-color border-color bg-transparent"
                aria-label="Default select example"
              >
                <option>Last 30 days</option>
                <option value="1">Last 90 days</option>
                <option value="2">Last 1 year</option>
              </Form.Select>
            </div>
          </div>

          <div className="default-table-area style-two transaction-history-large">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th>
                      <div className="d-flex align-items-center">
                        <div className="form-check">
                          <input
                            className="form-check-input"
                            type="checkbox"
                            checked={
                              currentTransactions.length > 0 &&
                              selectedRows.length === currentTransactions.length
                            }
                            onChange={handleSelectAll}
                          />
                        </div>
                        <span className="ms-1">Transaction ID</span>
                      </div>
                    </th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  {currentTransactions.map((transaction, index) => (
                    <tr key={index}>
                      <td className="py-3">
                        <div className="d-flex align-items-center">
                          <div
                            className="form-check"
                            style={{ position: "relative", top: "-1px" }}
                          >
                            <input
                              className="form-check-input"
                              type="checkbox"
                              checked={selectedRows.includes(transaction.id)}
                              onChange={() => handleRowSelect(transaction.id)}
                            />
                          </div>
                          <span className="ms-1 text-secondary">
                            {transaction.id}
                          </span>
                        </div>
                      </td>
                      <td className="py-3">{transaction.date}</td>
                      <td className="py-3">{transaction.description}</td>
                      <td className="py-3 text-primary">
                        {transaction.amount}
                      </td>
                      <td className="py-3">{transaction.type}</td>
                      <td className="py-3">
                        <span
                          className={`d-inline-block fs-12 px-2 py-1 rounded-1 ${
                            transaction.status === "Completed"
                              ? "bg-success bg-opacity-10 text-success"
                              : "bg-warning bg-opacity-10 text-warning"
                          }`}
                        >
                          {transaction.status}
                        </span>
                      </td>
                      <td className="py-3">
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
                Showing {currentTransactions.length} of {allTransactions.length}{" "}
                Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={() => paginate(currentPage - 1)}
                      disabled={currentPage === 1}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  {Array.from({ length: totalPages }, (_, i) => i + 1).map(
                    (page) => (
                      <li className="page-item" key={page}>
                        <Button
                          className={`page-link ${
                            currentPage === page ? "active" : ""
                          }`}
                          onClick={() => paginate(page)}
                        >
                          {page}
                        </Button>
                      </li>
                    )
                  )}
                  <li className="page-item">
                    <Button
                      className="page-link icon"
                      onClick={() => paginate(currentPage + 1)}
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

export default TransactionHistory;

"use client";

import { Card, Table, Button, Form } from "react-bootstrap";
import { useState } from "react";

const TransactionHistory = () => {
  const [transactions] = useState([
    {
      id: "#TID0015",
      date: "2024-10-01",
      description: "Payment from Client",
      amount: "$5,000",
      type: "Income",
    },
    {
      id: "#TID0099",
      date: "2024-09-28",
      description: "Office Supplies",
      amount: "$10,000",
      type: "Expense",
    },
    {
      id: "#TID0145",
      date: "2024-09-25",
      description: "Website Maintenance",
      amount: "$35,000",
      type: "Expense",
    },
    {
      id: "#TID0247",
      date: "2024-09-22",
      description: "Payment from Client",
      amount: "$2,000",
      type: "Income",
    },
    {
      id: "#TID0299",
      date: "2024-09-20",
      description: "Advertising Campaign",
      amount: "$15,500",
      type: "Expense",
    },
    {
      id: "#TID0350",
      date: "2024-09-18",
      description: "Office Rent",
      amount: "$7,500",
      type: "Expense",
    },
    {
      id: "#TID0421",
      date: "2024-09-15",
      description: "Payment from Client",
      amount: "$3,200",
      type: "Income",
    },
    {
      id: "#TID0455",
      date: "2024-09-12",
      description: "Travel Expenses",
      amount: "$1,800",
      type: "Expense",
    },
    {
      id: "#TID0499",
      date: "2024-09-10",
      description: "Consultation Fee",
      amount: "$12,000",
      type: "Income",
    },
    {
      id: "#TID0520",
      date: "2024-09-08",
      description: "Stationery",
      amount: "$500",
      type: "Expense",
    },
  ]);

  const [selectedTransactions, setSelectedTransactions] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const rowsPerPage = 6;

  // Calculate total pages
  const totalPages = Math.ceil(transactions.length / rowsPerPage);

  // Get transactions for the current page
  const currentTransactions = transactions.slice(
    (currentPage - 1) * rowsPerPage,
    currentPage * rowsPerPage
  );

  // Handlers for pagination
  const goToNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  const goToPreviousPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  // Checkbox handlers
  const handleSelectAll = (isChecked) => {
    if (isChecked) {
      const currentPageTransactionIds = currentTransactions.map((t) => t.id);
      setSelectedTransactions([
        ...new Set([...selectedTransactions, ...currentPageTransactionIds]),
      ]);
    } else {
      const currentPageTransactionIds = currentTransactions.map((t) => t.id);
      setSelectedTransactions((prev) =>
        prev.filter((id) => !currentPageTransactionIds.includes(id))
      );
    }
  };

  const handleSelectOne = (id, isChecked) => {
    setSelectedTransactions((prev) =>
      isChecked
        ? [...prev, id]
        : prev.filter((transactionId) => transactionId !== id)
    );
  };

  const isTransactionSelected = (id) => selectedTransactions.includes(id);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 p-4">
            <h3 className="mb-0">Transaction History</h3>

            <Form.Select
              className="month-select form-control w-135 bg-border-color border-color bg-transparent"
              aria-label="Default select example"
            >
              <option value="0">Last 30 days</option>
              <option value="1">Last 90 days</option>
              <option value="2">Last 1 year</option>
            </Form.Select>
          </div>

          <div className="default-table-area style-two transaction-history">
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
                            onChange={(e) => handleSelectAll(e.target.checked)}
                            checked={currentTransactions.every((t) =>
                              isTransactionSelected(t.id)
                            )}
                          />
                        </div>
                        <span className="ms-1">
                          <span className="fs-12 fw-bold">Transaction</span> ID
                        </span>
                      </div>
                    </th>
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {currentTransactions.map((transaction) => (
                    <tr key={transaction.id}>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="form-check">
                            <input
                              className="form-check-input"
                              type="checkbox"
                              onChange={(e) =>
                                handleSelectOne(
                                  transaction.id,
                                  e.target.checked
                                )
                              }
                              checked={isTransactionSelected(transaction.id)}
                            />
                          </div>
                          <span className="ms-1 text-secondary">
                            {transaction.id}
                          </span>
                        </div>
                      </td>
                      <td>{transaction.date}</td>
                      <td>{transaction.description}</td>
                      <td className="text-primary">{transaction.amount}</td>
                      <td>{transaction.type}</td>
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
                          <button
                            onClick={() => deleteTransaction(transaction.id)}
                            className="ps-0 border-0 bg-transparent lh-1"
                          >
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

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4 z-0">
              <span className="fs-12 fw-medium">
                Showing {currentTransactions.length} of {transactions.length}{" "}
                Results
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
                      onClick={goToPreviousPage}
                      disabled={currentPage === 1}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  <li
                    className={`page-item ${
                      currentPage === totalPages ? "disabled" : ""
                    }`}
                  >
                    <Button
                      className="page-link icon"
                      onClick={goToNextPage}
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

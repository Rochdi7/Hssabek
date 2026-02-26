"use client";

import React, { useState } from "react";
import { Dropdown, Card } from "react-bootstrap";

const RecentTransactions = () => {
  const [transactions] = useState([
    {
      id: 1,
      name: "Master Card",
      date: "23 Dec 2023 - 3:20 pm",
      amount: "+1,520",
      icon: "credit_card",
    },
    {
      id: 2,
      name: "Paypal",
      date: "23 Dec 2023 - 3:20 pm",
      amount: "-2,250",
      icon: "redeem",
    },
    {
      id: 3,
      name: "Wise",
      date: "23 Dec 2023 - 3:20 pm",
      amount: "+3,560",
      icon: "account_balance",
    },
    {
      id: 4,
      name: "Payoneer",
      date: "23 Dec 2023 - 3:20 pm",
      amount: "+6,500",
      icon: "currency_ruble",
    },
    {
      id: 5,
      name: "Credit Card",
      date: "23 Dec 2023 - 3:20 pm",
      amount: "-4,320",
      icon: "credit_score",
    },
  ]);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-0">
            <h3 className="mb-0">Recent Transactions</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <i className="material-symbols-outlined">more_horiz</i>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">schedule</i>
                  Today
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">pie_chart</i>
                  Last 7 Days
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">refresh</i>
                  Last Month
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">calendar_today</i>
                  Last 1 Year
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">bar_chart</i>
                  All Time
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">visibility</i>
                  View
                </Dropdown.Item>
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">delete</i>
                  Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <ul className="ps-0 mb-0 list-unstyled">
            {transactions.map((transaction) => {
              const isPositive = transaction.amount.startsWith("+");
              const amountClass = isPositive ? "text-success" : "text-danger";
              const iconClass = isPositive
                ? "bg-primary text-primary"
                : "bg-danger text-danger";

              return (
                <li
                  key={transaction.id}
                  className="d-flex align-items-center justify-content-between mt-2 pt-3"
                >
                  <div className="d-flex align-items-center">
                    <div className="flex-shrink-0">
                      <i 
                        className={`material-symbols-outlined icon-circle ${iconClass} bg-opacity-10 text-center rounded-circle wh-40 lh-40 fs-24`}
                      >
                        {transaction.icon}
                      </i>
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <h6 className="fw-medium fs16 mb-0">
                        {transaction.name}
                      </h6>
                      <span className="fs-12">{transaction.date}</span>
                    </div>
                  </div>
                  <span className={`fs-14 fw-medium ${amountClass}`}>
                    {transaction.amount}
                  </span>
                </li>
              );
            })}
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentTransactions;

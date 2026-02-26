"use client";

import { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Image from "next/image";

// Mock data for transactions (replace with data from an API or a state variable)
const transactionData = [
  // Add your mock transaction items here
  {
    id: "#001",
    client: {
      name: "Johhna Loren",
      email: "loren123@gmail.com",
      image: "/images/user-81.png",
    },
    amount: "$6240",
    plan: "Pro",
    paymentMethod: { name: "Paypal", icon: "/images/paypal.png" },
    status: { label: "Completed", className: "bg-success" },
  },
  {
    id: "#002",
    client: {
      name: "Skyler White",
      email: "skyqueen@gmail.com",
      image: "/images/user-82.png",
    },
    amount: "$5135",
    plan: "Enterprise",
    paymentMethod: { name: "Wise", icon: "/images/wise.png" },
    status: { label: "Pending", className: "bg-primary-div" },
  },
  {
    id: "#003",
    client: {
      name: "Jonathon Watson",
      email: "jona2134@gmail.com",
      image: "/images/user-83.png",
    },
    amount: "$4321",
    plan: "Startup",
    paymentMethod: { name: "Bank", icon: "/images/bank.png" },
    status: { label: "Failed", className: "bg-danger" },
  },
  {
    id: "#004",
    client: {
      name: "Walter White",
      email: "Puzzleworld",
      image: "/images/user-84.png",
    },
    amount: "$3124",
    plan: "Pro",
    paymentMethod: { name: "Skrill", icon: "/images/skrill.png" },
    status: { label: "Completed", className: "bg-success" },
  },
  {
    id: "#005",
    client: {
      name: "David Carlen",
      email: "Liveslong",
      image: "/images/user-85.png",
    },
    amount: "$2137",
    plan: "Basic",
    paymentMethod: { name: "Paypal", icon: "/images/paypal.png" },
    status: { label: "Pending", className: "bg-primary-div" },
  },
  {
    id: "#006",
    client: {
      name: "Skyler White",
      email: "skyqueen@gmail.com",
      image: "/images/user-82.png",
    },
    amount: "$5135",
    plan: "Enterprise",
    paymentMethod: { name: "Wise", icon: "/images/wise.png" },
    status: { label: "Pending", className: "bg-primary-div" },
  },
  {
    id: "#007",
    client: {
      name: "Walter White",
      email: "Puzzleworld",
      image: "/images/user-84.png",
    },
    amount: "$3124",
    plan: "Pro",
    paymentMethod: { name: "Skrill", icon: "/images/skrill.png" },
    status: { label: "Completed", className: "bg-success" },
  },
  {
    id: "#008",
    client: {
      name: "Jonathon Watson",
      email: "jona2134@gmail.com",
      image: "/images/user-83.png",
    },
    amount: "$4321",
    plan: "Startup",
    paymentMethod: { name: "Bank", icon: "/images/bank.png" },
    status: { label: "Failed", className: "bg-danger" },
  },
  {
    id: "#009",
    client: {
      name: "David Carlen",
      email: "Liveslong",
      image: "/images/user-85.png",
    },
    amount: "$2137",
    plan: "Basic",
    paymentMethod: { name: "Paypal", icon: "/images/paypal.png" },
    status: { label: "Pending", className: "bg-primary-div" },
  },
  {
    id: "#010",
    client: {
      name: "Johhna Loren",
      email: "loren123@gmail.com",
      image: "/images/user-81.png",
    },
    amount: "$6240",
    plan: "Pro",
    paymentMethod: { name: "Paypal", icon: "/images/paypal.png" },
    status: { label: "Completed", className: "bg-success" },
  },
];

const ITEMS_PER_PAGE = 5;

const LatestTransaction = () => {
  const [currentPage, setCurrentPage] = useState(1);

  // Calculate the data to be displayed on the current page
  const indexOfLastItem = currentPage * ITEMS_PER_PAGE;
  const indexOfFirstItem = indexOfLastItem - ITEMS_PER_PAGE;
  const currentItems = transactionData.slice(indexOfFirstItem, indexOfLastItem);
  const totalPages = Math.ceil(transactionData.length / ITEMS_PER_PAGE);

  const handlePrevPage = () => setCurrentPage((prev) => Math.max(prev - 1, 1));
  const handleNextPage = () =>
    setCurrentPage((prev) => Math.min(prev + 1, totalPages));

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <h3 className="mb-0">Latest Transaction</h3>
            <Form.Select
              className="month-select form-control w-135 bg-border-color border-color"
              aria-label="Default select example"
            >
              <option value="0">Monthly</option>
              <option value="1">Yearly</option>
            </Form.Select>
          </div>

          <div className="default-table-area style-two campaigns-table latest-transaction-table">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead>
                  <tr className="border-bottom">
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-12">ID</span>
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-12">CLIENT</span>
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-12">AMOUNT</span>
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-12">SUBSCRIPTION PLAN</span>
                    </th>
                    <th className="bg-transparent text-body fw-medium">
                      <span className="fs-12">PAYMENT METHOD</span>
                    </th>
                    <th className="text-end bg-transparent text-body fw-medium">
                      <span className="fs-12">STATUS</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {currentItems.map((transaction) => (
                    <tr key={transaction.id}>
                      <td className="fs-12 fw-semibold text-body">
                        {transaction.id}
                      </td>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={transaction.client.image}
                              className="rounded-circle"
                              alt="client"
                              width={40}
                              height={40}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2">
                            <h4 className="fs-14 fw-semibold mb-0">
                              {transaction.client.name}
                            </h4>
                            <span className="fs-12">
                              {transaction.client.email}
                            </span>
                          </div>
                        </div>
                      </td>
                      <td className="fs-12 fw-semibold text-body">
                        {transaction.amount}
                      </td>
                      <td className="fs-12 fw-semibold text-body">
                        {transaction.plan}
                      </td>
                      <td>
                        <div className="d-flex align-items-center gap-1">
                          <Image
                            src={transaction.paymentMethod.icon}
                            alt={transaction.paymentMethod.name}
                            width={24}
                            height={24}
                          />
                          <span className="ms-2">
                            {transaction.paymentMethod.name}
                          </span>
                        </div>
                      </td>
                      <td className="text-end">
                        <span
                          className={`d-inline-block px-2 ${
                            transaction.status.className
                          } bg-opacity-10 text-${
                            transaction.status.className.split("-")[1]
                          } border border-${
                            transaction.status.className.split("-")[1]
                          } rounded-pill fs-12 fw-medium`}
                        >
                          {transaction.status.label}
                        </span>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
              <span className="fs-12 fw-medium">
                Showing {currentItems.length} of {transactionData.length}{" "}
                Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      onClick={handlePrevPage}
                      className={`page-link icon ${
                        currentPage === 1 && "disabled"
                      }`}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>

                  <li className="page-item">
                    <Button
                      onClick={handleNextPage}
                      className={`page-link icon ${
                        currentPage === totalPages && "disabled"
                      }`}
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

export default LatestTransaction;

"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import { Card, Table, Dropdown } from "react-bootstrap";

const MyRecentPatients = () => {
  const [patients, setPatients] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5; // Number of items per page

  useEffect(() => {
    const fetchData = async () => {
      const data = [
        {
          id: "#001",
          name: "Johhna Loren",
          email: "loren123@gmail.com",
          image: "/images/user-81.png",
          disease: "Heart Attack",
          paymentStatus: "Paid",
          status: "Completed",
          statusColor: "success",
        },
        {
          id: "#002",
          name: "Skyler White",
          email: "skyqueen@gmail.com",
          image: "/images/user-80.png",
          disease: "Chest Pain",
          paymentStatus: "Paid",
          status: "Pending",
          statusColor: "primary-div",
        },
        {
          id: "#003",
          name: "Jonathon Watson",
          email: "jona2134@gmail.com",
          image: "/images/user-82.png",
          disease: "Breathing Issue",
          paymentStatus: "Unpaid",
          status: "Failed",
          statusColor: "danger",
        },
        {
          id: "#004",
          name: "Walter White",
          email: "puzzleworld@gmail.com",
          image: "/images/user-83.png",
          disease: "Heart Surgery",
          paymentStatus: "Paid",
          status: "Completed",
          statusColor: "success",
        },
        {
          id: "#005",
          name: "David Carlen",
          email: "liveslong@gmail.com",
          image: "/images/user-84.png",
          disease: "CVD",
          paymentStatus: "Unpaid",
          status: "Pending",
          statusColor: "primary-div",
        },
        {
          id: "#006",
          name: "Alice Smith",
          email: "alice.smith@gmail.com",
          image: "/images/user-85.png",
          disease: "Diabetes",
          paymentStatus: "Paid",
          status: "Completed",
          statusColor: "success",
        },
        {
          id: "#007",
          name: "Bob Johnson",
          email: "bob.johnson@gmail.com",
          image: "/images/user-86.png",
          disease: "Hypertension",
          paymentStatus: "Unpaid",
          status: "Pending",
          statusColor: "primary-div",
        },
        {
          id: "#008",
          name: "Charlie Brown",
          email: "charlie.brown@gmail.com",
          image: "/images/user-87.png",
          disease: "Asthma",
          paymentStatus: "Paid",
          status: "Completed",
          statusColor: "success",
        },
        {
          id: "#009",
          name: "Diana Prince",
          email: "diana.prince@gmail.com",
          image: "/images/user-88.png",
          disease: "Anemia",
          paymentStatus: "Unpaid",
          status: "Failed",
          statusColor: "danger",
        },
        {
          id: "#010",
          name: "Ethan Hunt",
          email: "ethan.hunt@gmail.com",
          image: "/images/user-89.png",
          disease: "Fracture",
          paymentStatus: "Paid",
          status: "Completed",
          statusColor: "success",
        },
      ];
      setPatients(data);
    };

    fetchData();
  }, []);

  // Pagination logic
  const totalPages = Math.ceil(patients.length / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const selectedPatients = patients.slice(
    startIndex,
    startIndex + itemsPerPage
  );

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h3 className="mb-0">My Recent Patient</h3>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-border-color border text-body rounded-2"
              >
                This Week
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Day
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Week
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Month
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  This Year
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div className="default-table-area style-two campaigns-table latest-transaction-table">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead>
                  <tr className="border-bottom">
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        ID
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        PATIENT NAME
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        DISEASE
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        PAYMENT STATUS
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        STATUS
                      </span>
                    </th>
                    <th
                      scope="col"
                      className="text-end bg-transparent text-body fw-medium"
                    >
                      <span className="fs-10 fw-bold letter-spacing-1 text-body-color-60">
                        ACTION
                      </span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {selectedPatients.map((patient, index) => (
                    <tr key={index}>
                      <td className="fs-12 fw-semibold text-body-color-50">
                        {patient.id}
                      </td>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={patient.image}
                              className="rounded-circle"
                              alt="nft"
                              width={40}
                              height={40}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2">
                            <h4
                              className="fs-14 fw-semibold mb-0"
                              style={{ color: "#23272E" }}
                            >
                              {patient.name}
                            </h4>
                            <span className="fs-12 text-body">
                              {patient.email}
                            </span>
                          </div>
                        </div>
                      </td>
                      <td className="fs-12 fw-semibold text-body-color-50">
                        {patient.disease}
                      </td>
                      <td className="fs-12 fw-semibold text-body-color-50">
                        {patient.paymentStatus}
                      </td>
                      <td>
                        <span
                          className={`d-inline-block px-2 bg-${patient.statusColor} bg-opacity-10 text-${patient.statusColor} border border-${patient.statusColor} rounded-pill fs-12 fw-medium`}
                        >
                          {patient.status}
                        </span>
                      </td>
                      <td className="text-end">
                        <Dropdown className="action-opt">
                          <Dropdown.Toggle
                            variant="secondary"
                            id="dropdown-basic"
                            className="bg-transparent p-0 lh-1"
                          >
                            <i className="material-symbols-outlined">
                              more_vert
                            </i>
                          </Dropdown.Toggle>

                          <Dropdown.Menu className="bg-white border box-shadow">
                            <Dropdown.Item href="#" className="px-3">
                              Edit
                            </Dropdown.Item>
                            <Dropdown.Item href="#" className="px-3">
                              View
                            </Dropdown.Item>
                            <Dropdown.Item href="#" className="px-3">
                              Delete
                            </Dropdown.Item>
                          </Dropdown.Menu>
                        </Dropdown>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
              <span className="fs-12 fw-medium">
                Showing {startIndex + 1} to{" "}
                {Math.min(startIndex + itemsPerPage, patients.length)} of{" "}
                {patients.length} results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <button
                      className={`page-link icon hover-bg ${
                        currentPage === 1 ? "disabled" : ""
                      }`}
                      onClick={() => setCurrentPage(currentPage - 1)}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
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
                      className={`page-link icon hover-bg ${
                        currentPage === totalPages ? "disabled" : ""
                      }`}
                      onClick={() => setCurrentPage(currentPage + 1)}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
                    </button>
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

export default MyRecentPatients;

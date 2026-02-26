"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";

const dealsData = [
  {
    id: "#854",
    companyName: "Tech Solutions",
    contactPerson: "Shawn Kennedy",
    amount: "$25,000.00",
    stage: "Proposal",
    probability: 80,
    closeDate: "15 Nov 2024",
    createdAt: "08 Nov 2024 10:30 AM",
  },
  {
    id: "#853",
    companyName: "Acma Industries",
    contactPerson: "Roberto Cruz",
    amount: "$15,000.00",
    stage: "Presentation",
    probability: 50,
    closeDate: "14 Nov 2024",
    createdAt: "09 Nov 2024 02:15 PM",
  },
  {
    id: "#852",
    companyName: "Synergy Ltd",
    contactPerson: "Juli Johnson",
    amount: "$30,000.00",
    stage: "Negotiation",
    probability: 75,
    closeDate: "13 Nov 2024",
    createdAt: "10 Nov 2024 09:45 AM",
  },
  {
    id: "#851",
    companyName: "Tech Enterprises",
    contactPerson: "Catalina Engles",
    amount: "$20,000.00",
    stage: "Discovery",
    probability: 90,
    closeDate: "12 Nov 2024",
    createdAt: "11 Nov 2024 03:45 PM",
  },
  {
    id: "#850",
    companyName: "Synetic Solutions",
    contactPerson: "Louis Nagle",
    amount: "$40,000.00",
    stage: "Contract Sent",
    probability: 60,
    closeDate: "13 Nov 2024",
    createdAt: "12 Nov 2024 01:00 PM",
  },
  {
    id: "#849",
    companyName: "GlobalTech Solutions",
    contactPerson: "Patrick Madsen",
    amount: "$50,000.00",
    stage: "Proposal",
    probability: 55,
    closeDate: "19 Nov 2024",
    createdAt: "13 Nov 2024 01:00 PM",
  },
  {
    id: "#848",
    companyName: "Quantum Solutions",
    contactPerson: "Lillian McCreary",
    amount: "$45,000.00",
    stage: "Negotiation",
    probability: 79,
    closeDate: "26 Nov 2024",
    createdAt: "14 Nov 2024 01:00 PM",
  },
  {
    id: "#847",
    companyName: "Synetic Pinnacle Ltd",
    contactPerson: "Beverly Caulkins",
    amount: "$35,000.00",
    stage: "Presentation",
    probability: 85,
    closeDate: "23 Nov 2024",
    createdAt: "15 Nov 2024 01:00 PM",
  },
  {
    id: "#846",
    companyName: "IT Solutions",
    contactPerson: "Alina Smith",
    amount: "$23,423.00",
    stage: "Proposal",
    probability: 11,
    closeDate: "14 Nov 2024",
    createdAt: "08 Nov 2024 10:30 AM",
  },
  {
    id: "#845",
    companyName: "Trezo Admin",
    contactPerson: "David Warner",
    amount: "$12,421.00",
    stage: "Discovery",
    probability: 53,
    closeDate: "11 Nov 2024",
    createdAt: "07 Nov 2024 10:30 AM",
  },
];

const DealsTable = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 p-4">
            <Form className="position-relative table-src-form me-0">
              <Form.Control type="text" placeholder="Search here" />

              <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>

            <div className="text-end">
              <button
                className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
                onClick={handleToggleShowModal}
              >
                <span className="py-sm-1 d-block">
                  <i className="ri-add-line"></i>
                  <span>Add New Lead</span>
                </span>
              </button>
            </div>
          </div>

          <div className="default-table-area style-two default-table-width deals-table">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <Form>
                        <Form.Check
                          type="checkbox"
                          id="default-checkbox"
                          label="ID"
                        />
                      </Form>
                    </th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Contact Person</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Stage</th>
                    <th scope="col">Probability</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Close Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {dealsData &&
                    dealsData.slice(0, 10).map((defaultValue, i) => (
                      <tr key={i}>
                        <td className="text-body">
                          <Form>
                            <Form.Check
                              type="checkbox"
                              id={defaultValue.id}
                              label={defaultValue.id}
                            />
                          </Form>
                        </td>

                        <td>{defaultValue.companyName}</td>

                        <td className="text-body">
                          {defaultValue.contactPerson}
                        </td>

                        <td>{defaultValue.amount}</td>

                        <td className="text-body">{defaultValue.stage}</td>

                        <td className="text-body">
                          {defaultValue.probability}%
                        </td>

                        <td className="text-body">{defaultValue.createdAt}</td>

                        <td className="text-body">{defaultValue.closeDate}</td>

                        <td>
                          <div className="d-flex align-items-center gap-1">
                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-primary">
                                visibility
                              </span>
                            </button>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-body">
                                edit
                              </span>
                            </button>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-danger">
                                delete
                              </span>
                            </button>
                          </div>
                        </td>
                      </tr>
                    ))}
                </tbody>
              </Table>

              {/* Pagination */}
              <div className="p-4">
                <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                  <span className="fs-12 fw-medium">
                    Showing 5 of 30 Results
                  </span>

                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <button className="page-link icon">
                          <span className="material-symbols-outlined">
                            keyboard_arrow_left
                          </span>
                        </button>
                      </li>
                      <li className="page-item">
                        <button className="page-link active">1</button>
                      </li>
                      <li className="page-item">
                        <button className="page-link">2</button>
                      </li>
                      <li className="page-item">
                        <button className="page-link icon">
                          <span className="material-symbols-outlined">
                            keyboard_arrow_right
                          </span>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal right ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Add New Deals</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Form.Group className="mb-4">
                <Form.Label className="label">ID No</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="ID No"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">User Name</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="User Name"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Email</Form.Label>
                <Form.Control
                  type="email"
                  className="text-dark"
                  placeholder="Email"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Phone</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Phone"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Due Date</Form.Label>
                <Form.Control type="date" className="text-dark" />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Company</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Company"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Lead Source</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Lead Source"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Status</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option>Select</option>
                  <option defaultValue="0">Confirmed</option>
                  <option defaultValue="1">In Progress</option>
                  <option defaultValue="2">Pending</option>
                  <option defaultValue="3">Rejected</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="d-flex gap-3">
                <Button
                  variant="primary"
                  type="submit"
                  className="text-white fw-semibold py-2 px-2 px-sm-3"
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line text-white"></i>{" "}
                    <span>Create New Deals</span>
                  </span>
                </Button>
              </Form.Group>
            </Form>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default DealsTable;

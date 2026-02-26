"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import SearchForm from "./SearchForm";
import Pagination from "./Pagination";
import Image from "next/image";

const instructorsData = [
  {
    id: "#A-1217",
    user: {
      img: "/images/user-13.jpg",
      name: "Olivia Clark",
      designation: "Big Data",
    },
    courses: 55,
    totalEarnings: "$6,855.00",
    email: "olivia@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
    ],
    status: "active",
  },

  {
    id: "#A-1364",
    user: {
      img: "/images/user-16.jpg",
      name: "Ava Turner",
      designation: "UX/UI",
    },
    courses: 120,
    totalEarnings: "$258.00",
    email: "ava@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-half-fill",
      },
    ],
    status: "deactive",
  },
  {
    id: "#A-2951",
    user: {
      img: "/images/user-17.jpg",
      name: "Lucas Morgan",
      designation: "Developer",
    },
    courses: 86,
    totalEarnings: "$3890.00",
    email: "lucas@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-line",
      },
    ],
    status: "active",
  },
  {
    id: "#A-7342",
    user: {
      img: "/images/user-18.jpg",
      name: "Isabella Cooper",
      designation: "Designer",
    },
    courses: 75,
    totalEarnings: "$2500.00",
    email: "isabella@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-half-fill",
      },
    ],
    status: "active",
  },
  {
    id: "#A-1217",
    user: {
      img: "/images/user-13.jpg",
      name: "Olivia Clark",
      designation: "Big Data",
    },
    courses: 55,
    totalEarnings: "$6,855.00",
    email: "olivia@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
    ],
    status: "active",
  },
  {
    id: "#A-1364",
    user: {
      img: "/images/user-16.jpg",
      name: "Ava Turner",
      designation: "UX/UI",
    },
    courses: 120,
    totalEarnings: "$258.00",
    email: "ava@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-half-fill",
      },
    ],
    status: "deactive",
  },
  {
    id: "#A-2951",
    user: {
      img: "/images/user-17.jpg",
      name: "Lucas Morgan",
      designation: "Developer",
    },
    courses: 86,
    totalEarnings: "$3890.00",
    email: "lucas@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-line",
      },
    ],
    status: "active",
  },
  {
    id: "#A-7342",
    user: {
      img: "/images/user-18.jpg",
      name: "Isabella Cooper",
      designation: "Designer",
    },
    courses: 75,
    totalEarnings: "$2500.00",
    email: "isabella@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-half-fill",
      },
    ],
    status: "active",
  },
  {
    id: "#A-1217",
    user: {
      img: "/images/user-13.jpg",
      name: "Olivia Clark",
      designation: "Big Data",
    },
    courses: 55,
    totalEarnings: "$6,855.00",
    email: "olivia@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
    ],
    status: "active",
  },
  {
    id: "#A-1364",
    user: {
      img: "/images/user-16.jpg",
      name: "Ava Turner",
      designation: "UX/UI",
    },
    courses: 120,
    totalEarnings: "$258.00",
    email: "ava@trezo.com",
    ratings: [
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-fill",
      },
      {
        star: "ri-star-half-fill",
      },
    ],
    status: "deactive",
  },
];

const Instructors = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <SearchForm />

              <button
                className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
                onClick={handleToggleShowModal}
              >
                <span className="py-sm-1 d-block">
                  <i className="ri-add-line"></i>
                  <span>Add New Instructor</span>
                </span>
              </button>
            </div>
          </div>

          <div className="default-table-area style-two all-projects">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Courses</th>
                    <th scope="col">Total Earnings</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ratings</th>
                    <th scope="col">Status</th>
                    <th scope="col" className="text-end">
                      Action
                    </th>
                  </tr>
                </thead>

                <tbody>
                  {instructorsData &&
                    instructorsData.slice(0, 10).map((value, i) => (
                      <tr key={i}>
                        <td className="text-body">{value.id}</td>

                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={value.user.img}
                                className="wh-44 rounded-circle"
                                alt="user"
                                width={44}
                                height={44}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2 position-relative top-2">
                              <h6 className="mb-0 fs-14 fw-medium text-secondary">
                                {value.user.name}
                              </h6>
                              <span className="fs-13 text-body">
                                {value.user.designation}
                              </span>
                            </div>
                          </div>
                        </td>

                        <td className="text-body">{value.courses}</td>

                        <td>{value.totalEarnings}</td>

                        <td className="text-body">{value.email}</td>

                        <td className="text-body">
                          <ul className="ps-0 mb-0 list-unstyled d-flex gap-1">
                            {value.ratings.slice(0, 5).map((value, i) => (
                              <li key={i}>
                                <i
                                  className={`text-rating-color fs-16 ${value.star}`}
                                ></i>
                              </li>
                            ))}
                          </ul>
                        </td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${value.status}`}
                          >
                            {value.status}
                          </span>
                        </td>

                        <td>
                          <div className="d-flex justify-content-end align-items-center gap-1">
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
              <Pagination />
            </div>
          </div>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal right ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Add New Instructor</h3>

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
                <Form.Label className="label">Name</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Name"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Courses</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Courses"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Total Earnings</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Total Earnings"
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
                <Form.Label className="label">Ratings</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option value="0">1</option>
                  <option value="1">2</option>
                  <option value="2">3</option>
                  <option value="3">4</option>
                  <option value="4">5</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Status</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option>Select</option>
                  <option value="0">Active</option>
                  <option value="1">Deactive</option>
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
                    <span>Create New Instructor</span>
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

export default Instructors;

"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import SearchForm from "./SearchForm";
import Pagination from "./Pagination";
import Image from "next/image";

const userData = [
  {
    id: "#999",
    userImg: "/images/user-6.jpg",
    userName: "Sarah Johnson",
    email: "sarah@trezo.com",
    role: "Project Manager",
    projectAccess: "Hotel Management System, Python Upgrade",
    status: "active",
  },
  {
    id: "#998",
    userImg: "/images/user-7.jpg",
    userName: "Carolyn Barnes",
    email: "carolyn@trezo.com",
    role: "Developer",
    projectAccess: "Project Monitoring, Project Alpho",
    status: "active",
  },
  {
    id: "#997",
    userImg: "/images/user-8.jpg",
    userName: "Donna Miller",
    email: "donna@trezo.com",
    role: "Business Analyst",
    projectAccess: "Aegis Accounting Service, Beja Banking Finance",
    status: "deactive",
  },
  {
    id: "#996",
    userImg: "/images/user-9.jpg",
    userName: "Barbara Cross",
    email: "barbara@trezo.com",
    role: "UI/UX Designer",
    projectAccess: "Aoriv AI Design, Vaxo App Design",
    status: "active",
  },
  {
    id: "#995",
    userImg: "/images/user-10.jpg",
    userName: "Rebecca Block",
    email: "rebecca@trezo.com",
    role: "QA Tester",
    projectAccess: "Product Development, Trezo Dashboard Design",
    status: "deactive",
  },
  {
    id: "#994",
    userImg: "/images/user-11.jpg",
    userName: "Ramiro McCarty",
    email: "ramiro@trezo.com",
    role: "Admin",
    projectAccess: "Hotel Management System, Python Upgrade",
    status: "active",
  },
  {
    id: "#993",
    userImg: "/images/user-12.jpg",
    userName: "Robert Fairweather",
    email: "robert@trezo.com",
    role: "Editor",
    projectAccess: "Project Monitoring, Project Alpho",
    status: "active",
  },
  {
    id: "#992",
    userImg: "/images/user-13.jpg",
    userName: "Marcelino Haddock",
    email: "marcelino@trezo.com",
    role: "Project Manager",
    projectAccess: "Aegis Accounting Service, Beja Banking Finance",
    status: "active",
  },
  {
    id: "#991",
    userImg: "/images/user-14.jpg",
    userName: "Thomas Wilson",
    email: "thomas@trezo.com",
    role: "UI/UX Designer",
    projectAccess: "Aoriv AI Design, Vaxo App Design",
    status: "active",
  },
  {
    id: "#990",
    userImg: "/images/user-15.jpg",
    userName: "Nathaniel Hulsey",
    email: "nathaniel@trezo.com",
    role: "Web Developer",
    projectAccess: "Product Development, Trezo Dashboard Design",
    status: "deactive",
  },
  {
    id: "#990",
    img: "images/users/user15.jpg",
    userName: "Nathaniel Hulsey",
    email: "nathaniel@trezo.com",
    role: "Web Developer",
    projectAccess: "Product Development, Trezo Dashboard Design",
    status: "deactive",
  },
];

const User = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <SearchForm />

            <button
              className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
              onClick={handleToggleShowModal}
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line"></i>
                <span>Add New User</span>
              </span>
            </button>
          </div>

          <div className="default-table-area default-table-width">
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
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Project Access</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {userData &&
                    userData.slice(0, 10).map((value, i) => (
                      <tr key={i}>
                        <td className="text-body">
                          <Form>
                            <Form.Check
                              type="checkbox"
                              id={value.id}
                              label={value.id}
                            />
                          </Form>
                        </td>

                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={value.userImg}
                                className="wh-34 rounded-circle"
                                alt="user"
                                width={34}
                                height={34}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2 position-relative top-1">
                              <h6 className="mb-0 fs-14 fw-medium">
                                {value.userName}
                              </h6>
                            </div>
                          </div>
                        </td>

                        <td className="text-body">{value.email}</td>

                        <td>{value.role}</td>

                        <td className="text-body">{value.projectAccess}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${value.status}`}
                          >
                            {value.status}
                          </span>
                        </td>

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
              <Pagination />
            </div>
          </div>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal right ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Add New User</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Form.Group className="mb-4">
                <Form.Label className="label">ID</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="ID"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">User</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="User name"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">User Image</Form.Label>
                <Form.Control type="file" />
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
                <Form.Label className="label">Role</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option value="0">Select</option>
                  <option value="1">Project Manager</option>
                  <option value="2">Developer</option>
                  <option value="3">Business Analyst</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Project Access</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Project Access"
                />
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
                    <span>Create New User</span>
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

export default User;

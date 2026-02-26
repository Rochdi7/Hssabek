"use client";

import React, { useState } from "react";
import { Dropdown, Card, Form } from "react-bootstrap";
import Image from "next/image";

const Done = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h4 className="mb-0">Done</h4>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">Select All</Dropdown.Item>

                <Dropdown.Item href="#">Edit All</Dropdown.Item>

                <Dropdown.Item href="#">Delete All</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div
            className="kb-card rounded-3 mb-4"
            style={{
              backgroundColor: "#DDE4FF",
              padding: "20px",
            }}
          >
            <div className="d-flex justify-content-between align-items-center mb-3">
              <h4 className="mb-0 fs-14 fw-semibold">Admin Template</h4>
              <button className="fs-20 text-body hover border-0 p-0 bg-transparent">
                <span className="material-symbols-outlined">edit</span>
              </button>
            </div>
            <p>
              A brief description of the project, its objectives, and its
              importance to the organization.
            </p>

            <div className="d-flex align-items-center justify-content-between pt-1">
              <div className="d-flex">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-30.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-31.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-32.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
              </div>
              <span className="text-danger">3 days left</span>
            </div>
          </div>

          <div
            className="kb-card rounded-3 mb-4"
            style={{
              backgroundColor: "#F3E8FF",
              padding: "20px",
            }}
          >
            <div className="d-flex justify-content-between align-items-center mb-3">
              <h4 className="mb-0 fs-14 fw-semibold">eCommerce Project</h4>
              <button className="fs-20 text-body hover border-0 p-0 bg-transparent">
                <span className="material-symbols-outlined">edit</span>
              </button>
            </div>
            <p>
              A brief description of the project, its objectives, and its
              importance to the organization.
            </p>
            <div className="d-flex align-items-center justify-content-between pt-1">
              <div className="d-flex">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-30.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-31.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
              </div>
              <span className="text-primary">7 days left</span>
            </div>
          </div>

          <div
            className="kb-card rounded-3 mb-4"
            style={{
              backgroundColor: "#D8FFC8",
              padding: "20px",
            }}
          >
            <div className="d-flex justify-content-between align-items-center mb-3">
              <h4 className="mb-0 fs-14 fw-semibold">Shopify Theme</h4>
              <button className="fs-20 text-body hover border-0 p-0 bg-transparent">
                <span className="material-symbols-outlined">edit</span>
              </button>
            </div>
            <p>
              A brief description of the project, its objectives, and its
              importance to the organization.
            </p>
            <div className="d-flex align-items-center justify-content-between pt-1">
              <div className="d-flex">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-30.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-31.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-32.jpg"
                    className="wh-34 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={34}
                    height={34}
                  />
                </div>
              </div>
              <span className="text-primary">7 days left</span>
            </div>
          </div>

          <button
            className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
            onClick={handleToggleShowModal}
          >
            <span className="py-sm-1 d-block">
              <i className="ri-add-line d-none d-sm-inline-block"></i>
              <span>Add New Card</span>
            </span>
          </button>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal right ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Add New Card</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Form.Group className="mb-4">
                <Form.Label className="label">Project Name</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Project Name"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Select User</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option value="0">Select</option>
                  <option value="1">Alex</option>
                  <option value="2">Staven</option>
                  <option value="3">Juhon</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">User Image</Form.Label>
                <Form.Control type="file" className="file" />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Deadline</Form.Label>
                <Form.Control type="date" />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Description</Form.Label>
                <Form.Control
                  as="textarea"
                  placeholder="Description"
                  style={{ height: "120px" }}
                ></Form.Control>
              </Form.Group>

              <Form.Group className="d-flex gap-3">
                <button className="btn btn-primary text-white fw-semibold py-2 px-2 px-sm-3">
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line text-white"></i>
                    <span>Create Card</span>
                  </span>
                </button>
              </Form.Group>
            </Form>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default Done;

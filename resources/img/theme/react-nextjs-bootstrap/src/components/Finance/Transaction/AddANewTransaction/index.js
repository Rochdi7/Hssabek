"use client";

import React, { useState } from "react";
import { Form, Row, Col } from "react-bootstrap";

const AddANewTransaction = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <button
        className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
        onClick={handleToggleShowModal}
      >
        <i className="ri-add-line d-none d-sm-inline-block"></i>
        <span>Add Transaction</span>
      </button>

      {/* Modal */}
      <div className={`custom-modal center ${isShowModal ? "" : "show"}`}>
        <div
          className="custom-modal-content position-relative z-3 p-4 p-md-5"
          style={{ borderRadius: "10px", maxWidth: "1120px", width: "100%" }}
        >
          <div className="d-flex align-items-center justify-content-between mb-3">
            <h3 className="fs-18 mb-0">Add A New Transaction</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div>
            <Form>
              <Row>
                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Transaction ID
                    </Form.Label>
                    <Form.Control
                      type="text"
                      className="h-55"
                      placeholder="Enter name"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">Date</Form.Label>
                    <Form.Control type="date" className="h-55" />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Description
                    </Form.Label>
                    <Form.Control
                      type="text"
                      className="h-55"
                      placeholder="Enter Transaction Description"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">Amount</Form.Label>
                    <Form.Control
                      type="number"
                      className="h-55"
                      placeholder="Enter Amount"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">Type</Form.Label>
                    <Form.Select
                      className="form-control h-55"
                      aria-label="Default select example"
                    >
                      <option>Select Type: Income/Expense</option>
                      <option value="1">Income</option>
                      <option value="2">Expense</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">Status</Form.Label>
                    <Form.Select
                      className="form-control h-55"
                      aria-label="Default select example"
                    >
                      <option>Select Type: Completed/Pending</option>
                      <option value="1">Completed</option>
                      <option value="2">Pending</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Payment Method
                    </Form.Label>
                    <Form.Control
                      type="text"
                      className="h-55"
                      placeholder="Enter Payment Method: Bank Transfer, Cash, Card"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">Action</Form.Label>
                    <Form.Select
                      className="form-control h-55"
                      aria-label="Default select example"
                    >
                      <option>Select Type: Action</option>
                      <option value="1">View</option>
                      <option value="2">Edit</option>
                      <option value="3">Delete</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <div className="mb-4">
                    <Form.Label className="text-secondary">
                      Notes{" "}
                      <span className="text-body fw-normal">
                        [Optional Notes]
                      </span>
                    </Form.Label>

                    <Form.Control
                      as="textarea"
                      rows={7}
                      placeholder="Write any additional note here..."
                    ></Form.Control>
                  </div>
                </Col>
              </Row>
            </Form>

            <div className="d-flex justify-content-end gap-2">
              <button
                type="button"
                className="btn btn-danger text-white px-3 m-0"
                onClick={handleToggleShowModal}
              >
                Cancel
              </button>

              <button
                type="button"
                className="btn btn-primary hover-bg px-3 m-0"
              >
                <i className="ri-add-line"></i>
                <span>Add A Transaction</span>
              </button>
            </div>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default AddANewTransaction;

"use client";

import React, { useState } from "react";
import { Form, Row, Col, Button } from "react-bootstrap"; 

const AddCardModal = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <div className="text-center mt-3 mt-sm-0">
        <button
          className="btn btn-outline-primary hover-bg fs-14 fw-medium"
          onClick={handleToggleShowModal}
        >
          <i className="ri-add-line"></i>
          <span>Add Card</span>
        </button>
      </div>

      {/* Modal */}
      <div className={`custom-modal center ${isShowModal ? "" : "show"}`}>
        <div className="d-table w-100 h-100">
          <div className="d-table-cell" style={{ verticalAlign: 'middle'}}>
            <div
              className="custom-modal-content position-relative z-3 p-4 p-md-5"
              style={{
                borderRadius: "10px",
                maxWidth: "738px",
                width: "100%",
                height: "auto",
              }}
            >
              <div className="d-flex align-items-center justify-content-between mb-3">
                <h3 className="fs-18 mb-0">Add Card Detail</h3>

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
                          Full Name
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
                        <Form.Label className="text-secondary">
                          Card Number
                        </Form.Label>
                        <Form.Control
                          type="text"
                          className="h-55"
                          placeholder="Enter card number"
                        />
                      </Form.Group>
                    </Col>

                    <Col sm={6}>
                      <Form.Group className="mb-4">
                        <Form.Label className="text-secondary">
                          Expiry Date
                        </Form.Label>
                        <Form.Control type="date" className="h-55" />
                      </Form.Group>
                    </Col>

                    <Col sm={6}>
                      <Form.Group className="mb-4">
                        <Form.Label className="text-secondary">CVV</Form.Label>
                        <Form.Control
                          type="number"
                          className="h-55"
                          placeholder="212"
                        />
                      </Form.Group>
                    </Col>
                  </Row>
                </Form>

                <div className="d-flex align-items-center justify-content-end gap-2">
                  <Button
                    type="button"
                    className="btn btn-danger text-white px-3"
                    onClick={handleToggleShowModal}
                  >
                    Cancel
                  </Button>
                  <Button
                    type="button"
                    className="btn btn-primary hover-bg px-3"
                  >
                    Add Card
                  </Button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default AddCardModal;

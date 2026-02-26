"use client";

import React, { useState } from "react";
import { Form, Row, Col, Button } from "react-bootstrap";
import Image from "next/image";

const AddANewCustomerModal = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  // Upload image
  const [imagePreview, setImagePreview] = useState("/images/customer1.png"); // Default image

  // Handle file selection and preview
  const handleFileChange = (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = () => setImagePreview(reader.result);
      reader.readAsDataURL(file);
    }
  };

  return (
    <>
      <div className="text-end mt-3 mt-sm-0">
        <button
          className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
          onClick={handleToggleShowModal}
        >
          <i className="ri-add-line d-none d-sm-inline-block"></i>
          <span>Add Customer</span>
        </button>
      </div>

      {/* Modal */}
      <div className={`custom-modal center ${isShowModal ? "" : "show"}`}>
        <div
          className="custom-modal-content position-relative z-3 p-4 p-md-5"
          style={{ borderRadius: "10px", maxWidth: "1120px", width: "100%" }}
        >
          <div className="d-flex align-items-center justify-content-between mb-3">
            <h3 className="fs-18 mb-0">Add A New Customer</h3>

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
                      Customer ID
                    </Form.Label>
                    <Form.Control
                      type="text"
                      className="h-55"
                      placeholder="#TRE0015"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Customer Name
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
                      Customer Address
                    </Form.Label>
                    <Form.Control
                      type="text"
                      className="h-55"
                      placeholder="Enter location"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Join Date
                    </Form.Label>
                    <Form.Control type="date" className="h-55" />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Customer Phone
                    </Form.Label>
                    <Form.Control
                      type="number"
                      className="h-55"
                      placeholder="Enter phone"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Customer Email
                    </Form.Label>
                    <Form.Control
                      type="email"
                      className="h-55"
                      placeholder="Enter email"
                    />
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">
                      Customer Type
                    </Form.Label>
                    <Form.Select
                      className="form-control h-55"
                      aria-label="Default select example"
                    >
                      <option value="0">Select Type:</option>
                      <option value="1">Buyer</option>
                      <option value="2">Seller</option>
                      <option value="3">Commercial</option>
                      <option value="4">Investor</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col sm={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="text-secondary">Action</Form.Label>
                    <Form.Select
                      className="form-control h-55"
                      aria-label="Default select example"
                    >
                      <option value="0">Select Type: Action</option>
                      <option value="1">View</option>
                      <option value="2">Edit</option>
                      <option value="2">Delete</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <Form.Group className="mb-4 only-file-upload">
                    <Form.Label className="text-secondary">
                      Add Customer Photo
                    </Form.Label>

                    <Form.Control
                      type="file"
                      className="h-55"
                      accept="image/*"
                      onChange={handleFileChange}
                    />

                    <div className="mt-3">
                      <Image
                        src={imagePreview}
                        alt="customer"
                        width={50}
                        height={50} 
                      />
                    </div>
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <div className="d-flex justify-content-end gap-2">
                    <Button
                      type="button"
                      className="btn btn-danger text-white px-3 m-0"
                      onClick={handleToggleShowModal}
                    >
                      Cancel
                    </Button>

                    <Button
                      type="button"
                      className="btn btn-primary hover-bg px-3 m-0"
                    >
                      <i className="ri-add-line"></i>
                      <span>Add A Customer</span>
                    </Button>
                  </div>
                </Col>
              </Row>
            </Form>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default AddANewCustomerModal;

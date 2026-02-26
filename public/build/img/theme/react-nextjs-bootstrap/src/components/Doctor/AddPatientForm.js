"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import Link from "next/link";
import { Card, Form, Row, Col } from "react-bootstrap";

const AddPatientForm = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Form>
            <Row>
              <Col lg={12}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Patient ID</label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter Patient ID"
                  />
                </div>
              </Col>

              <Col sm={6} lg={6}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">
                    Patient First name
                  </label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter First Name"
                  />
                </div>
              </Col>

              <Col sm={6} lg={6}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">
                    Patient Last name
                  </label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter Last Name"
                  />
                </div>
              </Col>

              <Col sm={6} lg={6}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Email Address</label>
                  <input
                    type="email"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter Email Address"
                  />
                </div>
              </Col>

              <Col sm={6} lg={6}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Phone Number</label>
                  <input
                    type="number"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter Phone Number"
                  />
                </div>
              </Col>

              <Col lg={12}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">
                    Disease Description
                  </label>
                  <textarea
                    rows="5"
                    className="form-control"
                    placeholder="Enter disease description"
                  ></textarea>
                </div>
              </Col>

              <Col lg={12}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">
                    Appointment Date
                  </label>
                  <input
                    type="date"
                    className="form-control h-60 border-border-color"
                  />
                </div>
              </Col>

              <Col lg={12}>
                <div className="mb-4">
                  <label className="label text-secondary">Add Avatar</label>
                  <div className="d-fslex align-items-center">
                    <div className="avatar-upload mw-100">
                      <div className="mb-2">
                        <input
                          type="file"
                          id="imageUpload"
                          className="form-control h-60"
                          accept=".png, .jpg, .jpeg"
                          style={{
                            paddingTop: "18px",
                          }}
                        />
                      </div>

                      <span className="fs-12 mb-2 d-block">
                        Please upload your image with a size of 115 x 115
                      </span>

                      <div>
                        <Image
                          src="/images/user-144.png"
                          alt="user"
                          className="rounded-circle"
                          width={115}
                          height={115}
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </Col>

              <Col lg={12}>
                <div className="d-flex flex-wrap gap-3">
                  <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
                    Cancel
                  </button>
                  <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
                    {" "}
                    <i className="ri-add-line text-white fw-medium"></i> Add
                    Patient
                  </button>
                </div>
              </Col>
            </Row>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default AddPatientForm;

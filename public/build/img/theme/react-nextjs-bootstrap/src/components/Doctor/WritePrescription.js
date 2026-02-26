"use client";

import React, { useEffect, useState } from "react";
import Image from "next/image";
import Link from "next/link";
import { Card, Row, Col, Form } from "react-bootstrap";

const WritePrescription = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body
          className="custom-padding-30"
          style={{
            paddingTop: "35px",
            paddingBottom: "26px",
          }}
        >
          <div className="d-flex flex-wrap gap-2 justify-content-between">
            <div>
              <h3 className="fs-20 fw-semibold">Dr. Walter White</h3>
              <span className="fs-16 d-block text-body-color-60 mb-1">
                MBBS, MD, MS (Reg No: 321456)
              </span>
              <span className="fs-16 text-secondary">
                Mobile No:+321 4567 5643
              </span>
            </div>
            <div>
              <Image
                src="/images/trezo-clinic.png"
                className="mb-2 doctor-filter-img"
                alt="trezo-clinic"
                width={174}
                height={26}
              />
              <span className="fs-16 d-block text-body-color-50 mb-1">
                S. Arrowhead Court Branford9
              </span>
              <span className="fs-16 text-body-color-50">+1 444 266 5599</span>
            </div>
          </div>
        </Card.Body>

        <div className="border-bottom"></div>

        <Card.Body className="custom-padding-30 pt-4">
          <Form>
            <Row>
              <Col lg={12}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Select Date</label>
                  <input
                    type="date"
                    className="form-control h-60 border-border-color"
                  />
                </div>
              </Col>

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

              <Col sm={6} lg={12}>
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

              <Col sm={6} lg={12}>
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

              <Col lg={12}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">
                    Patient Address
                  </label>
                  <input
                    type="number"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter Address"
                  />
                </div>
              </Col>

              <Col lg={6}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">
                    Temperature (Fahrenheit)
                  </label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter First Name"
                  />
                </div>
              </Col>

              <Col lg={6}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Blood Pressure</label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color"
                    placeholder="Blood Pressure"
                  />
                </div>
              </Col>
            </Row>

            <h3 className="fs-16 fw-semibold mt-4 mb-3">Medicine 01</h3>

            <Row>
              <Col md={4}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Medicine Name</label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter Medicine Name"
                  />
                </div>
              </Col>

              <Col md={4}>
                <div className="form-group mb-0">
                  <label className="label text-secondary">Dosage</label>
                </div>
                <div className="form-group mb-3 d-flex justify-content-between align-items-center border rounded-3 border-border-color px-3 medicine-time">
                  <span className="fs-14 fw-semibold text-secondary-50">
                    Morning
                  </span>
                  <span className="fs-14 fw-semibold text-secondary-50">-</span>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color text-end fs-14 fw-semibold text-secondary-50 p-0 border-0"
                    style={{
                      width: "30px",
                    }}
                    defaultValue="01"
                  />
                </div>
                <div className="form-group mb-3 d-flex justify-content-between align-items-center border rounded-3 border-border-color px-3 medicine-time">
                  <span className="fs-14 fw-semibold text-secondary-50">
                    Night
                  </span>
                  <span className="fs-14 fw-semibold text-secondary-50">-</span>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color text-end fs-14 fw-semibold text-secondary-50 p-0 border-0"
                    style={{
                      width: "30px",
                    }}
                    defaultValue="01"
                  />
                </div>
                <button
                  type="button"
                  className="btn-outline-primary btn hover-bg mb-3"
                >
                  <div className="d-flex align-items-center">
                    <i className="ri-add-line position-relative top-1 me-2"></i>
                    <span>Add More Dosage</span>
                  </div>
                </button>
              </Col>

              <Col md={4}>
                <div className="form-group mb-3">
                  <label className="label text-secondary">Duration</label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color fs-14 fw-semibold text-secondary-50"
                    defaultValue="10 Days"
                  />
                </div>
                <div className="form-group mb-3 d-flex justify-content-between align-items-center border rounded-3 border-border-color px-3 medicine-time">
                  <span className="fs-14 fw-semibold text-secondary-50">
                    Total
                  </span>
                  <span className="fs-14 fw-semibold text-secondary-50">-</span>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color text-end fs-14 fw-semibold text-secondary-50 p-0 border-0"
                    style={{
                      width: "30px",
                    }}
                    defaultValue="20"
                  />
                </div>
              </Col>
            </Row>

            <h3 className="fs-16 fw-semibold mt-4 mb-3">Medicine 02</h3>

            <Row>
              <Col md={4}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Medicine Name</label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color"
                    placeholder="Enter Medicine Name"
                  />
                </div>
              </Col>

              <Col md={4}>
                <div className="form-group mb-0">
                  <label className="label text-secondary">Dosage</label>
                </div>
                <div className="form-group mb-3 d-flex justify-content-between align-items-center border rounded-3 border-border-color px-3 medicine-time">
                  <span className="fs-14 fw-semibold text-secondary-50">
                    Morning
                  </span>
                  <span className="fs-14 fw-semibold text-secondary-50">-</span>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color text-end fs-14 fw-semibold text-secondary-50 p-0 border-0"
                    style={{
                      width: "30px",
                    }}
                    defaultValue="01"
                  />
                </div>
                <div className="form-group mb-3 d-flex justify-content-between align-items-center border rounded-3 border-border-color px-3 medicine-time">
                  <span className="fs-14 fw-semibold text-secondary-50">
                    Night
                  </span>
                  <span className="fs-14 fw-semibold text-secondary-50">-</span>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color text-end fs-14 fw-semibold text-secondary-50 p-0 border-0"
                    style={{
                      width: "30px",
                    }}
                    defaultValue="01"
                  />
                </div>
                <button
                  type="button"
                  className="btn-outline-primary btn hover-bg mb-3"
                >
                  <div className="d-flex align-items-center">
                    <i className="ri-add-line position-relative top-1 me-2"></i>
                    <span>Add More Dosage</span>
                  </div>
                </button>
              </Col>

              <Col md={4}>
                <div className="form-group mb-3">
                  <label className="label text-secondary">Duration</label>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color fs-14 fw-semibold text-secondary-50"
                    defaultValue="10 Days"
                  />
                </div>
                <div className="form-group mb-3 d-flex justify-content-between align-items-center border rounded-3 border-border-color px-3 medicine-time">
                  <span className="fs-14 fw-semibold text-secondary-50">
                    Total
                  </span>
                  <span className="fs-14 fw-semibold text-secondary-50">-</span>
                  <input
                    type="text"
                    className="form-control h-60 border-border-color text-end fs-14 fw-semibold text-secondary-50 p-0 border-0"
                    style={{
                      width: "30px",
                    }}
                    defaultValue="20"
                  />
                </div>
              </Col>
            </Row>

            <div className="my-md-5 py-4">
              <button type="button" className="btn btn-primary">
                <div className="d-flex align-items-center">
                  <i className="ri-add-line position-relative top-1 me-2 text-white"></i>
                  <span>Add More Medicine</span>
                </div>
              </button>
            </div>

            <div className="col-lg-12">
              <div className="form-group mb-4">
                <label className="label text-secondary">Advice</label>
                <textarea
                  rows="5"
                  className="form-control"
                  placeholder="Add additional advice"
                ></textarea>
              </div>
            </div>

            <div className="col-lg-12">
              <div className="mb-4">
                <label className="label text-secondary">Upload Signature</label>
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
                    <span className="fs-12 mb-4 d-block">
                      Please upload your image with a size of 135 x 135
                    </span>
                    <div className="avatar-preview rounded-0 border">
                      <div
                        id="imagePreview"
                        className="rounded-0"
                        style={{
                          backgroundImage: "url(/images/signature.png)",
                          backgroundSize: "auto",
                        }}
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div className="col-lg-12">
              <div className="d-flex justify-content-end flex-wrap gap-3 pt-4">
                <button
                  className="btn btn-danger px-4 fw-medium fs-16 text-white"
                  style={{
                    paddingTop: "11px",
                    paddingBottom: "11px",
                  }}
                >
                  Cancel
                </button>
                <button
                  className="btn btn-primary px-4 fw-medium fs-16"
                  style={{
                    paddingTop: "11px",
                    paddingBottom: "11px",
                  }}
                >
                  {" "}
                  <i className="ri-add-line text-white fw-medium"></i> Create
                  Prescription
                </button>
              </div>
            </div>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default WritePrescription;

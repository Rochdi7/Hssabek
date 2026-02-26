"use client";

import { Container, Row, Col, Form } from "react-bootstrap";
import Image from "next/image";

const ContactUs = () => {
  return (
    <>
      <div
        className="contact-us-area pt-150 position-relative z-2" 
      >
        <Container>
          <Row className="align-items-center">
            <Col lg={6}>
              <div className="contact-us-img mb-4 mb-lg-0">
                <Image
                  src="/images/landing/contact-us.jpg"
                  alt="contact-us"
                  width={1084}
                  height={1444}
                />
              </div>
            </Col>

            <Col lg={6}>
              <div className="contact-us-form ms-xl-4">
                <span className="top-title">
                  <span>Contact Us</span>
                </span>

                <h2>
                  Introducing Our Exceptional Team. Meet the Minds Driving Our
                  Success
                </h2>

                <Form>
                  <Form.Group className="mb-4">
                    <label className="label text-secondary">Full Name</label>
                    <Form.Control
                      type="text"
                      className="bg-transparent h-55"
                      placeholder="Your full name"
                    />
                  </Form.Group>

                  <Form.Group className="mb-4">
                    <label className="label text-secondary">
                      Email Address
                    </label>
                    <Form.Control
                      type="email"
                      className="bg-transparent h-55"
                      placeholder="Your email address"
                    />
                  </Form.Group>

                  <Form.Group className="mb-4">
                    <label className="label text-secondary">Phone Number</label>
                    <Form.Control
                      type="text"
                      className="bg-transparent h-55"
                      placeholder="Your phone number"
                    />
                  </Form.Group>

                  <Form.Group className="mb-4">
                    <label className="label text-secondary">Subject</label>
                    <Form.Select
                      className="form-control bg-transparent h-55"
                      aria-label="Default select example"
                    >
                      <option value="0">Select your subject</option>
                      <option value="1">Help Dask</option>
                      <option value="2">LMS</option>
                      <option value="3">CRM</option>
                    </Form.Select>
                  </Form.Group>

                  <Form.Group className="mb-4">
                    <label className="label text-secondary">Phone Number</label>
                    <textarea
                      rows="5"
                      className="form-control bg-transparent"
                      placeholder="Write your message..."
                    ></textarea>
                  </Form.Group>

                  <Form.Group className="mb-0">
                    <button
                      type="submit"
                      className="btn btn-primary py-2 px-4 w-100 d-flex align-items-center justify-content-center gap-1"
                    >
                      <i className="ri-refresh-line fs-18 text-white"></i>
                      <span>Send</span>
                    </button>
                  </Form.Group>
                </Form>
              </div>
            </Col>
          </Row>
        </Container>
      </div>
    </>
  );
};

export default ContactUs;

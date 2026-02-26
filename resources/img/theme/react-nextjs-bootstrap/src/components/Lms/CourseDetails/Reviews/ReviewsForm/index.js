"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const ReviewsForm = () => {
  return (
    <>
      <div className="d-sm-flex justify-content-between  mb-4">
        <h3 className="fs-18 fw-semibold text-center">Write Feedback Here:</h3>

        <ul className="ps-0 mb-0 list-unstyled d-flex gap-2 justify-content-center ratings">
          <li className="rating">
            <i className="ri-star-fill fs-20"></i>
          </li>
          <li className="rating">
            <i className="ri-star-fill fs-20"></i>
          </li>
          <li className="rating">
            <i className="ri-star-fill fs-20"></i>
          </li>
          <li className="rating">
            <i className="ri-star-fill fs-20"></i>
          </li>
          <li className="rating">
            <i className="ri-star-fill fs-20"></i>
          </li>
        </ul>
      </div>

      <Card className="bg-body-bg border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Form>
            <Row>
              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Your Name</label>
                  <Form.Control
                    type="text"
                    className="h-55 text-dark"
                    placeholder="Your Name"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Your Email</label>
                  <Form.Control
                    type="email"
                    className="h-55 text-dark"
                    placeholder="Your Email"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Your Phone No</label>
                  <Form.Control
                    type="number"
                    className="h-55 text-dark"
                    placeholder="Your Phone No"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Your Subject</label>
                  <Form.Control
                    type="email"
                    className="h-55 text-dark"
                    placeholder="Your Subject"
                  />
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Write Comment</label>
                  <textarea
                    className="form-control"
                    placeholder="Write Comment"
                    cols="30"
                    rows="10"
                  ></textarea>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-0">
                  <button
                    type="submit"
                    className="btn btn-primary text-white fw-semibold py-3 px-5"
                  >
                    Submit
                  </button>
                </Form.Group>
              </Col>
            </Row>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default ReviewsForm;

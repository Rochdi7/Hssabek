"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const TextualInputs = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Textual Inputs</h4>

          <Form>
            <Row>
              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">First Name</label>
                  <Form.Group className="position-relative">
                    <Form.Control
                      type="text"
                      className="text-dark ps-5 h-55"
                      placeholder="Enter Name"
                    />
                    <i className="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Last Name</label>
                  <Form.Group className="position-relative">
                    <Form.Control
                      type="text"
                      className="text-dark ps-5 h-55"
                      placeholder="Enter Name"
                    />
                    <i className="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Email Address</label>
                  <Form.Group className="position-relative">
                    <Form.Control
                      type="email"
                      className="text-dark ps-5 h-55"
                      placeholder="Enter Email Address"
                    />
                    <i className="ri-mail-line position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Phone</label>
                  <Form.Group className="position-relative">
                    <Form.Control
                      type="number"
                      className="text-dark ps-5 h-55"
                      placeholder="Enter Phone Number"
                    />
                    <i className="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Address</label>
                  <Form.Group className="position-relative">
                    <Form.Control
                      type="number"
                      className="text-dark ps-5 h-55"
                      placeholder="Your Location"
                    />
                    <i className="ri-map-pin-line position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Country</label>
                  <Form.Group className="position-relative">
                    <Form.Select
                      className="form-control ps-5 h-55"
                      aria-label="Default select example"
                    >
                      <option value="0" className="text-dark">
                        United Kingdom
                      </option>
                      <option value="1" className="text-dark">
                        United States
                      </option>
                      <option value="2" className="text-dark">
                        Canada
                      </option>
                      <option value="3" className="text-dark">
                        France
                      </option>
                    </Form.Select>
                    <i className="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Town/City</label>
                  <Form.Group className="position-relative">
                    <Form.Select
                      className="form-control ps-5 h-55"
                      aria-label="Default select example"
                    >
                      <option value="0" className="text-dark">
                        California
                      </option>
                      <option value="1" className="text-dark">
                        United States
                      </option>
                      <option value="2" className="text-dark">
                        Canada
                      </option>
                      <option value="3" className="text-dark">
                        France
                      </option>
                    </Form.Select>
                    <i className="ri-list-ordered position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">State</label>
                  <Form.Group className="position-relative">
                    <Form.Select
                      className="form-control ps-5 h-55"
                      aria-label="Default select example"
                    >
                      <option value="0" className="text-dark">
                        South poal evenue state 4C
                      </option>
                      <option value="1" className="text-dark">
                        United States
                      </option>
                      <option value="2" className="text-dark">
                        Canada
                      </option>
                      <option value="3" className="text-dark">
                        France
                      </option>
                    </Form.Select>
                    <i className="ri-font-size position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Zip Code</label>
                  <Form.Group className="position-relative">
                    <Form.Control
                      type="number"
                      className="ps-5 h-55"
                      placeholder="Enter number"
                    />
                    <i className="ri-hashtag position-absolute top-50 start-0 translate-middle-y fs-20 ps-20"></i>
                  </Form.Group>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-0">
                  <label className="label text-secondary">Order Notes :</label>
                  <Form.Group className="position-relative">
                    <textarea
                      className="form-control ps-5 text-dark"
                      placeholder="Some demo text ... "
                      cols="30"
                      rows="5"
                    ></textarea>
                    <i className="ri-information-line position-absolute top-0 start-0 fs-20 ps-20 pt-2"></i>
                  </Form.Group>
                </Form.Group>
              </Col>
            </Row>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default TextualInputs;

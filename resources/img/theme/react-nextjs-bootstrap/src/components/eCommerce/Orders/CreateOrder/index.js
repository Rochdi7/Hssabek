"use client";

import { Row, Col, Card, Form } from "react-bootstrap";
import YourOrder from "./YourOrder";

const CreateOrder = () => {
  return (
    <>
      <Form>
        <Row>
          <Col lg={7} xxl={8}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <h3 className="mb-lg-4 mb-3">Billing Information</h3>

                <Row>
                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Customer Name
                      </Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter Customer Name"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">Phone Number</Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter Phone Number"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Email Address
                      </Form.Label>
                      <Form.Control
                        type="email"
                        className="h-55"
                        placeholder="Enter Email Address"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">State</Form.Label>
                      <Form.Select
                        className="form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">State</option>
                        <option defaultValue="1">Florida</option>
                        <option defaultValue="2">Wisconsin</option>
                        <option defaultValue="3">Washington</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">City</Form.Label>
                      <Form.Select
                        className="form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">State</option>
                        <option defaultValue="1">New York</option>
                        <option defaultValue="2">Tokyo</option>
                        <option defaultValue="3">Amsterdam</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        ZIP / Postcode
                      </Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter zip postcode"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Street Address
                      </Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter Street Address"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">Country</Form.Label>
                      <Form.Select
                        className="form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">Select</option>
                        <option defaultValue="1">USA</option>
                        <option defaultValue="2">Canada</option>
                        <option defaultValue="3">Spain</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Order Note (optional)
                      </Form.Label>
                      <textarea
                        rows="7"
                        className="form-control"
                        placeholder="Write your note here...."
                      ></textarea>
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <div className="d-flex flex-wrap gap-3">
                      <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
                        Cancel
                      </button>
                      <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
                        {" "}
                        <i className="ri-add-line text-white fw-medium"></i>{" "}
                        Create Order
                      </button>
                    </div>
                  </Col>
                </Row>
              </Card.Body>
            </Card>
          </Col>

          <Col lg={5} xxl={4}>
            <YourOrder />

            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <h3 className="mb-3 mb-lg-4">Payment Method</h3>

                <Row>
                  <Col sm={6} lg={12}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Payment Card
                      </Form.Label>
                      <Form.Select
                        className="form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">PayPal</option>
                        <option defaultValue="1">Stax</option>
                        <option defaultValue="2">Helcim</option>
                        <option defaultValue="3">Square</option>
                        <option defaultValue="4">Stripe</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={12}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Card Number
                      </Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter Card Number"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={12}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Expiration Date
                      </Form.Label>
                      <Form.Control type="date" className="h-55" />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={12}>
                    <Form.Group className="mb-0">
                      <Form.Label className="label text-secondary">
                        Security Code
                      </Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter Security Code"
                      />
                    </Form.Group>
                  </Col>
                </Row>
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Form>
    </>
  );
};

export default CreateOrder;

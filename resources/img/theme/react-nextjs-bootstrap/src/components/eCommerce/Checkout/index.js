"use client";

import { Row, Col, Card, Form, Table } from "react-bootstrap";

const Checkout = () => {
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
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Customer Name
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        placeholder="Enter Customer Name"
                      />
                    </div>
                  </Col>

                  <Col sm={6} lg={6}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Phone Number
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        placeholder="Enter Phone Number"
                      />
                    </div>
                  </Col>

                  <Col sm={6} lg={6}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Email Address
                      </label>
                      <input
                        type="email"
                        className="form-control h-55"
                        placeholder="Enter Email Address"
                      />
                    </div>
                  </Col>

                  <Col sm={6} lg={6}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">State</label>
                      <select
                        className="form-select form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">State</option>
                        <option defaultValue="1">Florida</option>
                        <option defaultValue="2">Wisconsin</option>
                        <option defaultValue="3">Washington</option>
                      </select>
                    </div>
                  </Col>

                  <Col sm={6} lg={6}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">City</label>
                      <select
                        className="form-select form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">State</option>
                        <option defaultValue="1">New York</option>
                        <option defaultValue="2">Tokyo</option>
                        <option defaultValue="3">Amsterdam</option>
                      </select>
                    </div>
                  </Col>

                  <Col sm={6} lg={6}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        ZIP / Postcode
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        placeholder="Enter zip postcode"
                      />
                    </div>
                  </Col>

                  <Col sm={6} lg={6}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Street Address
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        placeholder="Enter Street Address"
                      />
                    </div>
                  </Col>

                  <Col sm={6} lg={6}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">Country</label>
                      <select
                        className="form-select form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">Select</option>
                        <option defaultValue="1">USA</option>
                        <option defaultValue="2">Canada</option>
                        <option defaultValue="3">Spain</option>
                      </select>
                    </div>
                  </Col>

                  <Col sm={12} lg={12}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Order Note (optional)
                      </label>
                      <textarea
                        rows="6"
                        className="form-control"
                        placeholder="Write your note here...."
                      ></textarea>
                    </div>
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
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <h3 className="mb-3 mb-lg-4">Order Summary</h3>

                <div className="default-table-area mb-3 mb-lg-4">
                  <div className="table-responsive">
                    <Table className="table align-middle">
                      <thead>
                        <tr>
                          <th scope="col">Description</th>
                          <th scope="col" className="text-end">
                            Price
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Grand Total :</td>
                          <td className="text-end">$1,105.00</td>
                        </tr>
                        <tr>
                          <td>Discount :</td>
                          <td className="text-end">-$105.00</td>
                        </tr>
                        <tr>
                          <td>Tax :</td>
                          <td className="text-end">$75.00</td>
                        </tr>
                        <tr>
                          <td className="text-secondary fw-medium">
                            Subtotal :
                          </td>
                          <td className="text-secondary fw-medium text-end">
                            $1,000.00
                          </td>
                        </tr>
                        <tr>
                          <td>Shipping Charge :</td>
                          <td className="text-end">$80.00</td>
                        </tr>
                        <tr>
                          <td>Coupon Charge :</td>
                          <td className="text-secondary text-end">$20.00</td>
                        </tr>
                        <tr>
                          <td className="text-secondary fw-medium">Total :</td>
                          <td className="text-secondary fw-medium text-end">
                            $900.00
                          </td>
                        </tr>
                      </tbody>
                    </Table>
                  </div>
                </div>
              </Card.Body>
            </Card>

            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <h3 className="mb-3 mb-lg-4">Payment Method</h3>

                <Row>
                  <Col sm={6} lg={12}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Payment Card
                      </label>
                      <select
                        className="form-select form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">Select</option>
                        <option defaultValue="1">PayPal</option>
                        <option defaultValue="2">Helcim</option>
                        <option defaultValue="3">Square</option>
                        <option defaultValue="4">Stripe</option>
                        <option defaultValue="5">Stax</option>
                      </select>
                    </div>
                  </Col>

                  <Col sm={6} lg={12}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Card Number
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        placeholder="Enter Card Number"
                      />
                    </div>
                  </Col>

                  <Col sm={6} lg={12}>
                    <div className="form-group mb-4">
                      <label className="label text-secondary">
                        Expiration Date
                      </label>
                      <input type="date" className="form-control h-55" />
                    </div>
                  </Col>
                  
                  <Col sm={6} lg={12}>
                    <div className="form-group mb-0">
                      <label className="label text-secondary">
                        Security Code
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        placeholder="Enter Security Code"
                      />
                    </div>
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

export default Checkout;

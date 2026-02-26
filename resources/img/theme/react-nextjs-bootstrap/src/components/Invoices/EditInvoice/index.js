"use client";

import { Row, Col, Card, Form, Table } from "react-bootstrap";

const EditInvoice = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Form className="mb-4">
            <Row>
              <Col sm={6} lg={3}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Invoice ID</label>
                  <input
                    type="text"
                    className="form-control h-55"
                    defaultValue="#JAN-2345"
                  />
                </div>
              </Col>

              <Col sm={6} lg={3}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Status</label>
                  <select
                    className="form-select form-control h-55"
                    aria-label="Default select example"
                  >
                    <option value="0">Status</option>
                    <option value="1">Paid</option>
                    <option value="2">Unpaid</option>
                    <option value="3">Cancelled</option>
                  </select>
                </div>
              </Col>

              <Col sm={6} lg={3}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Date</label>
                  <input type="date" className="form-control h-55" />
                </div>
              </Col>

              <Col sm={6} lg={3}>
                <div className="form-group mb-4">
                  <label className="label text-secondary">Due Date</label>
                  <input type="date" className="form-control h-55" />
                </div>
              </Col>

              <Col sm={6} lg={3}>
                <div className="mb-0 border p-4 rounded-3 position-relative">
                  <p className="mb-4 text-secondary fw-medium">From:</p>
                  <p className="mb-1 fw-medium text-secondary">Olivia John</p>
                  <p className="mb-1 text-body">olivia@trezo.com</p>
                  <p className="mb-1 text-body">
                    4545 Seth Street Ballinger, TX 78965
                  </p>

                  <p className="mb-0 text-body">+1 444 556 8899</p>

                  <button
                    type="submit"
                    className="btn border-primary text-primary position-absolute hover-bg"
                    style={{ right: "24px", top: "24px" }}
                  >
                    <i className="ri-pencil-line"></i> Change
                  </button>
                </div>
              </Col>

              <Col sm={6} lg={3}>
                <div className="mt-4 mt-md-0 border p-4 rounded-3 position-relative h-md-100">
                  <p className="mb-4 text-secondary fw-medium">To:</p>

                  <button
                    type="submit"
                    className="btn border-primary text-primary position-absolute hover-bg"
                    style={{ right: "24px", top: "24px" }}
                  >
                    <i className="ri-add-line"></i>
                    Add
                  </button>
                </div>
              </Col>
            </Row>
          </Form>

          <div className="default-table-area all-products">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td className="text-body">1</td>
                    <td>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="Apple MacBook Pro 16.2' with M3 Pro Chip"
                      />
                    </td>
                    <td>
                      <input
                        type="number"
                        className="form-control h-55"
                        placeholder="1"
                      />
                    </td>
                    <td>
                      <input
                        type="number"
                        className="form-control h-55"
                        placeholder="Enter price"
                      />
                    </td>
                    <td className="text-body">$0.00</td>
                    <td>
                      <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                        <span className="material-symbols-outlined fs-20 text-danger">
                          delete
                        </span>
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <button className="btn btn-primary">
                        <i className="ri-add-line text-white"></i>
                        Add Item
                      </button>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <label className="text-secondary label">
                        Discount(%)
                      </label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="0.00"
                      />
                    </td>
                    <td>
                      <label className="text-secondary label">Tax(%)</label>
                      <input
                        type="text"
                        className="form-control h-55"
                        defaultValue="0.00"
                      />
                    </td>
                    <td></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td className="text-body">Sub total:</td>
                    <td className="text-body">$0.00</td>
                    <td></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td className="text-body">Tax (5%)</td>
                    <td className="text-body">$0.00</td>
                    <td></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td className="text-body">Discount (0%)</td>
                    <td className="text-body">- $0.00</td>
                    <td></td>
                  </tr>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td className="fw-medium text-secondary">Grand Total</td>
                    <td className="text-secondary">$0.00</td>
                    <td></td>
                  </tr>
                </tbody>
              </Table>
            </div>
          </div>

          <div className="d-flex flex-wrap gap-3 justify-content-center mt-4">
            <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
              Cancel
            </button>
            <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
              {" "}
              <i className="ri-add-line text-white fw-medium"></i> Create
            </button>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default EditInvoice;

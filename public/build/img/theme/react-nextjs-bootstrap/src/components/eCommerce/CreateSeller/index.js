"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const CreateSeller = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Form>
            <Row>
              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">Seller Name</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter Seller Name"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">Store Name</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter Store Name"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">Phone Number</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter Phone Number"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">Email Address</Form.Label>
                  <Form.Control
                    type="email"
                    className="h-55"
                    placeholder="Enter Email Address"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">Date of Birth</Form.Label>
                  <Form.Control type="date" className="h-55" />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
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

              <Col sm={6} lg={4}>
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

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">ZIP / Postcode</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter zip postcode"
                  />
                </Form.Group>
              </Col>

              <Col sm={12} lg={4}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">Wallet Balance</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter wallet balance"
                  />
                </Form.Group>
              </Col>

              <Col sm={12} lg={12}>
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary fs-14">Description</Form.Label>

                  <Form.Control as="textarea" rows={6} placeholder="Type description here..." /> 
                </Form.Group>
              </Col>

              <div className="col-lg-12">
                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">Upload Image</Form.Label>

                  <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
                    <div className="product-upload">
                      <label htmlFor="file-upload" className="file-upload mb-0">
                        <i className="ri-folder-image-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>
                        <span className="d-block text-body fs-14">
                          Drag and drop an image or{" "}
                          <span className="text-primary text-decoration-underline">
                            Browse
                          </span>
                        </span>
                      </label>
                      <Form.Control id="file-upload" type="file" />
                    </div>
                  </div>
                </Form.Group>
              </div>

              <Col sm={12} lg={12}>
                <div className="d-flex flex-wrap gap-3">
                  <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
                    Cancel
                  </button>
                  <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
                    {" "}
                    <i className="ri-add-line text-white fw-medium"></i> Create
                    Seller
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

export default CreateSeller;

"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const AddUser = () => {
  return (
    <>
      <Form>
        <Row>
          <Col lg={8}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <Row>
                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">User IDe</label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter user id"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">User Name</label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter user name"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Email Address
                      </label>
                      <Form.Control
                        type="email"
                        className="h-55"
                        placeholder="Enter email address"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Location</label>
                      <select
                        className="form-select form-control h-55"
                        aria-label="Default select example"
                      >
                        <option defaultValue="0">Select</option>
                        <option defaultValue="1">New Zealand</option>
                        <option defaultValue="2">Germany</option>
                        <option defaultValue="3">United States</option>
                        <option defaultValue="4">Switzerland</option>
                      </select>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Phone Number
                      </label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="+1 444 555 6699"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Projects</label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="Enter Projects"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Add Some Info
                      </label>
                      <textarea
                        rows="6"
                        className="form-control"
                        placeholder="Type here...."
                      ></textarea>
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Facebook</label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="https://www.facebook.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">X</label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="https://x.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">Linkedin</label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="https://www.linkedin.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={6} lg={6}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">GitHub</label>
                      <Form.Control
                        type="text"
                        className="h-55"
                        placeholder="https://www.github.com/"
                      />
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <Form.Group className="mb-4">
                      <label className="label text-secondary">
                        Upload Product Images
                      </label>
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
                          <input id="file-upload" type="file" />
                        </div>
                      </div>
                    </Form.Group>
                  </Col>

                  <Col sm={12} lg={12}>
                    <div className="d-flex flex-wrap gap-3">
                      <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
                        Cancel
                      </button>
                      <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
                        {" "}
                        <i className="ri-add-line text-white fw-medium"></i> Add
                        User
                      </button>
                    </div>
                  </Col>
                </Row>
              </Card.Body>
            </Card>
          </Col>

          <Col lg={4}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <h3 className="mb-lg-4 mb-3">Privacy Policy</h3>

                <div className="mb-4">
                  <div className="form-check mb-3">
                    <input
                      className="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                    />
                    <label className="form-check-label" htmlFor="flexCheckDefault">
                      Allow users to show your email
                    </label>
                  </div>

                  <div className="form-check mb-3">
                    <input
                      className="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckChecked2"
                    />
                    <label className="form-check-label" htmlFor="flexCheckChecked2">
                      Allow users to show your experiences
                    </label>
                  </div>

                  <div className="form-check mb-0">
                    <input
                      className="form-check-input"
                      type="checkbox"
                      value=""
                      id="flexCheckChecked3"
                    />
                    <label className="form-check-label" htmlFor="flexCheckChecked3">
                      Allow users to show your followers
                    </label>
                  </div>
                </div>

                <label className="label text-secondary">
                  Select Your Skills
                </label>

                <select
                  className="form-select form-control h-55"
                  aria-label="Default select example"
                >
                  <option defaultValue="0">Select</option>
                  <option defaultValue="1">Data Analysis</option>
                  <option defaultValue="2">Project Management</option>
                  <option defaultValue="3">Teamwork</option>
                  <option defaultValue="4">Leadership</option>
                </select>
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Form>
    </>
  );
};

export default AddUser;

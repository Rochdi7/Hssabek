"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const CreateProject = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
              <h3 className="mb-0">Create a new project</h3>
            </div>

            <Form>
              <Row>
                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Project Name</Form.Label>
                    <Form.Control
                      type="text"
                      placeholder="Write project name"
                    />
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Project ID</Form.Label>
                    <Form.Control type="text" placeholder="Write project ID" />
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Start Date</Form.Label>
                    <Form.Control type="date" />
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">End Date</Form.Label>
                    <Form.Control type="date" />
                  </Form.Group>
                </Col>

                <Col lg={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">
                      Project Description
                    </Form.Label>
                    <textarea
                      rows="5"
                      className="form-control"
                      placeholder="Type here......"
                    ></textarea>
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Budget</Form.Label>
                    <Form.Control type="text" placeholder="Enter budget" />
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Priority Status</Form.Label>
                    <Form.Select
                      className="form-control"
                      aria-label="Default select example"
                    >
                      <option value="0">Select</option>
                      <option value="1">Yes</option>
                      <option value="2">No</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Categories</Form.Label>
                    <Form.Select
                      className="form-control"
                      aria-label="Default select example"
                    >
                      <option value="0">Select</option>
                      <option value="1">WP</option>
                      <option value="2">HTML</option>
                      <option value="2">Vue</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Project Manager</Form.Label>
                    <Form.Select
                      className="form-control"
                      aria-label="Default select example"
                    >
                      <option value="0">Select</option>
                      <option value="1">Alex</option>
                      <option value="2">Staven</option>
                      <option value="2">Juhon</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Add team Members</Form.Label>
                    <Form.Select
                      className="form-control"
                      aria-label="Default select example"
                    >
                      <option value="0">Select</option>
                      <option value="1">Alex</option>
                      <option value="2">Staven</option>
                      <option value="2">Juhon</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Project Tags</Form.Label>
                    <Form.Select
                      className="form-control"
                      aria-label="Default select example"
                    >
                      <option value="0">Select</option>
                      <option value="1">HTML</option>
                      <option value="2">WP</option>
                      <option value="2">Vue</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">
                      Project Preview Image
                    </Form.Label>

                    <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
                      <div className="product-upload">
                        <label
                          htmlFor="file-upload"
                          className="file-upload mb-0"
                        >
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

                <Col lg={6}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Attached File</Form.Label>

                    <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
                      <div className="product-upload">
                        <label
                          htmlFor="file-upload"
                          className="file-upload mb-0"
                        >
                          <i className="ri-file-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>
                          <span className="d-block text-body fs-14">
                            Drag and drop a file or{" "}
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

                <Col lg={12}>
                  <div className="d-flex flex-wrap gap-3">
                    <button className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">
                      Cancel
                    </button>
                    <button className="btn btn-primary py-2 px-4 fw-medium fs-16">
                      {" "}
                      <i className="ri-add-line text-white fw-medium"></i>{" "}
                      Create Project
                    </button>
                  </div>
                </Col>
              </Row>
            </Form>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default CreateProject;

"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const CreateCourse = () => {
  return (
    <>
      <Form>
        <Row>
          <Col lg={7}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <h3 className="mb-4">Add Course</h3>

                <Row>
                  <Col lg={12}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Title
                      </Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55 text-secondary"
                        placeholder="Write title"
                      />
                    </Form.Group>
                  </Col>

                  <Col lg={12}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary fs-14">
                        Description
                      </Form.Label>

                      <Form.Control as="textarea" rows={6} placeholder="Type here..." /> 
                    </Form.Group>
                  </Col>

                  <Col lg={12}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Price
                      </Form.Label>
                      <Form.Control
                        type="text"
                        className="h-55 text-secondary"
                        placeholder="Write price"
                      />
                    </Form.Group>
                  </Col>

                  <Col lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Start Date
                      </Form.Label>
                      <Form.Control
                        type="date"
                        className="h-55 text-secondary"
                      />
                    </Form.Group>
                  </Col>

                  <Col lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        End Date
                      </Form.Label>
                      <Form.Control
                        type="date"
                        className="h-55 text-secondary"
                      />
                    </Form.Group>
                  </Col>

                  <Col lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Instructor
                      </Form.Label>
                      <Form.Select
                        className="form-control text-dark h-55 cursor"
                        aria-label="Default select example"
                      >
                        <option value="0">Select</option>
                        <option value="1">Olivia Clark</option>
                        <option value="2">Ava Turner</option>
                        <option value="3">Lucas Morgan</option>
                        <option value="4">Isabella Cooper</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col lg={6}>
                    <Form.Group className="mb-4">
                      <Form.Label className="label text-secondary">
                        Tags
                      </Form.Label>
                      <Form.Select
                        className="form-control text-dark h-55 cursor"
                        aria-label="Default select example"
                      >
                        <option value="0">Select</option>
                        <option value="1">Technology </option>
                        <option value="2">Science</option>
                        <option value="3">Health & Wellness</option>
                        <option value="4">Education</option>
                      </Form.Select>
                    </Form.Group>
                  </Col>

                  <Col lg={12}>
                    <Form.Group>
                      <Form.Label className="label text-secondary">
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
                </Row>
              </Card.Body>
            </Card>
          </Col>

          <Col lg={5}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <h3 className="mb-4">Add Course</h3>

                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">
                    Lesson Title
                  </Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Write Lesson Title"
                  />
                </Form.Group>

                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">
                    Lesson Time
                  </Form.Label>
                  <Form.Control type="time" className="h-55" />
                </Form.Group>

                <Form.Group className="mb-4">
                  <Form.Label className="label text-secondary">
                    Lesson Description
                  </Form.Label>
                  <textarea
                    rows="5"
                    className="form-control"
                    placeholder="Type here...."
                  ></textarea>
                </Form.Group>

                <div className="d-flex flex-wrap gap-3 justify-content-between">
                  <button className="btn btn-danger fs-16 fw-medium text-white py-2 px-4">
                    <span className="d-inline-block py-1">Save Course</span>
                  </button>

                  <button className="btn btn-primary fs-16 fw-medium text-white py-2 px-4">
                    <i className="ri-add-line text-white fw-medium fs-18"></i>
                    <span className="d-inline-block py-1">Add More Field</span>
                  </button>
                </div>
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Form>
    </>
  );
};

export default CreateCourse;

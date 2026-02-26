"use client";

import { Row, Col, Card, Form } from "react-bootstrap";

const EditAnEvent = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <Form>
            <Row>
              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Name</label>
                  <Form.Control
                    type="text"
                    className="h-55" 
                    defaultValue="Annual Conference 2024"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Ticket Type</label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option value="0">Select</option>
                    <option value="1">Free</option>
                    <option value="2">Paid</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Ticket Price</label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    defaultValue="$20.00"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Type</label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option value="0">Select</option>
                    <option value="1">Online</option>
                    <option value="2">Offline</option>
                    <option value="2">Both</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Select Topic</label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option value="0">Select</option>
                    <option value="1">Pepper Festival</option>
                    <option value="2">A Day of Comedy</option>
                    <option value="2">Replicate</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Vanue</label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    defaultValue="2750 Quadra Street Victoria Road"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Country</label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option value="0">Select</option>
                    <option value="1">Switzerland</option>
                    <option value="2">New Zealand</option>
                    <option value="2">Germany</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event State</label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option value="0">Select</option>
                    <option value="1">Florida</option>
                    <option value="2">Wisconsin</option>
                    <option value="2">Washington</option>
                  </Form.Select>
                </Form.Group>
              </Col>
              
              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event City</label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option value="0">Select</option>
                    <option value="1">New York</option>
                    <option value="2">Tokyo</option>
                    <option value="2">London</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">
                    Event Start Date
                  </label>
                  <Form.Control type="date" className="h-55" />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event End Date</label>
                  <Form.Control type="date" className="h-55" />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Time</label>
                  <Form.Control type="time" className="h-55" />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">
                    Registration Deadline
                  </label>
                  <Form.Control type="date" className="h-55" />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">
                    Event Organizers
                  </label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    defaultValue="Hand Watch"
                  />
                </Form.Group>
              </Col>

              <Col sm={6} lg={4}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Sponsors</label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    defaultValue="Hand Watch"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Details</label>

                  <Form.Control as="textarea" rows={6} placeholder="Type here..." /> 
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Event Image</label>
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
                    <i className="ri-add-line text-white fw-medium"></i> Create
                    Event
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

export default EditAnEvent;

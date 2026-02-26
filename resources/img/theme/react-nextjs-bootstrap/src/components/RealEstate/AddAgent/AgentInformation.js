"use client";

import React, { useState } from "react";
import { Card, Button, Form, Row, Col } from "react-bootstrap";
import Image from "next/image";

const AgentInformation = () => {
  // State to store the uploaded image
  const [image, setImage] = useState(null);

  // Handle image file selection
  const handleImageChange = (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onloadend = () => {
        setImage(reader.result); // Set the image data to state
      };
      reader.readAsDataURL(file); // Convert image to base64
    }
  };

  return (
    <>
      <Card className="rounded-3 border-0 bg-white mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-4">Agent Information</h3>

          <Form>
            <Row>
              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">Agent Name</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter agent name"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">Agency</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter agency name"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Phone Number
                  </Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="Enter phone number"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">Email</Form.Label>
                  <Form.Control
                    type="email"
                    className="h-55"
                    placeholder="Enter email address"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    License Number
                  </Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="Enter license number"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Years of Experience
                  </Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter years of experience"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Specialization
                  </Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Enter specialization"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Office Location
                  </Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="Enter office address"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Recent Achievements
                  </Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="List recent achievements"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Client Testimonials
                  </Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="Include client testimonials"
                  />
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Additional Notes
                  </Form.Label>
                  <Form.Control
                    as="textarea"
                    rows={6}
                    placeholder="Enter any additional information"
                  ></Form.Control>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="only-file-upload mb-4">
                  <Form.Label className="text-secondary">
                    Add Agent Photo
                  </Form.Label>

                  <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
                    <div className="product-upload">
                      <label className="file-upload mb-0">
                        <i className="ri-folder-image-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>
                        <span className="d-block text-body fs-14">
                          Drag and drop an image or{" "}
                          <span className="text-primary text-decoration-underline">
                            Browse
                          </span>
                        </span>
                      </label>
                      <label className="position-absolute top-0 bottom-0 start-0 end-0 cursor">
                        <input
                          className="form__file bottom-0"
                          type="file"
                          accept="image/*"
                          onChange={handleImageChange} // Handle the file input change
                        />
                      </label>
                    </div>
                  </div>

                  {/* Show the uploaded image or default image */}
                  <div className="mt-3">
                    {image ? (
                      <Image
                        src={image}
                        alt="property"
                        width={60}
                        height={60}
                        objectFit="cover"
                      />
                    ) : (
                      <Image
                        src="/images/agent-1.png" // Default image
                        alt="agent"
                        width={60}
                        height={60}
                        objectFit="cover"
                      />
                    )}
                  </div>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <div className="d-flex flex-wrap gap-3 justify-content-end">
                  <Button
                    type="button"
                    className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white"
                  >
                    Cancel
                  </Button>

                  <Button
                    type="submit"
                    className="btn btn-primary py-2 px-4 fw-medium fs-16"
                  >
                    {" "}
                    <i className="ri-add-line text-white fw-medium"></i> Add
                    Agent
                  </Button>
                </div>
              </Col>
            </Row>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default AgentInformation;

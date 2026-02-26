"use client";

import React, { useState } from "react";
import { Card, Button, Form, Row, Col } from "react-bootstrap";
import Image from "next/image";

const PropertyInformation = () => {
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
          <h3 className="mb-4">Property Information</h3>

          <Form>
            <Row>
              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Property Type
                  </Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Property name"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Property Status
                  </Form.Label>
                  <Form.Select
                    className="form-control h-55"
                    aria-label="Default select example"
                  >
                    <option>Select Property Status</option>
                    <option value="1">Sale</option>
                    <option value="2">Rent</option>
                    <option value="3">Sold</option>
                  </Form.Select>
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Property Price
                  </Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="$18,000"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Property Categories
                  </Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="Multi family"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">Beds</Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="6"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">Baths</Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="5"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">Area</Form.Label>
                  <Form.Control
                    type="text"
                    className="h-55"
                    placeholder="1800 sqft"
                  />
                </Form.Group>
              </Col>

              <Col lg={6}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">Address</Form.Label>
                  <Form.Control
                    type="number"
                    className="h-55"
                    placeholder="Enter address"
                  />
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="mb-4">
                  <Form.Label className="text-secondary">
                    Description
                  </Form.Label>
                  <Form.Control
                    as="textarea"
                    rows={6}
                    placeholder="Enter description"
                  ></Form.Control>
                </Form.Group>
              </Col>

              <Col lg={12}>
                <Form.Group className="only-file-upload mb-4">
                  <Form.Label className="text-secondary">
                    Add Property Photo
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
                        width={100}
                        height={60}
                        objectFit="cover"
                      />
                    ) : (
                      <Image
                        src="/images/property-5.png" // Default image
                        alt="property"
                        width={100}
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
                    Property
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

export default PropertyInformation;

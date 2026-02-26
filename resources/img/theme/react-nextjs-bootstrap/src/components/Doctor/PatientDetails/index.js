"use client";

import React, { useState } from "react";
import Image from "next/image"; 
import { Card, Row, Col } from "react-bootstrap";

const PatientDetails = () => {
  // State to manage the uploaded image
  const [imagePreview, setImagePreview] = useState("/images/user-144.png"); // Default image

  // Handle image upload
  const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onloadend = () => {
        setImagePreview(reader.result); // Set the image preview to the uploaded file
      };
      reader.readAsDataURL(file); // Read the file as a data URL
    }
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body style={{ padding: "10px" }}>
          <div
            className="bg-img rounded-top-2 doctor-cover-bg"
            style={{
              backgroundImage: "url(/images/doctor-details-cover.png)",
              paddingTop: "145px",
              backgroundPosition: "bottom",
            }}
          >
            <div
              className="d-flex gap-4 align-items-end"
              style={{
                paddingLeft: "20px",
                paddingBottom: "20px",
              }}
            >
              <div className="flex-shrink-0">
                <div className="avatar-upload">
                  <div className="avatar-edit bottom-0 end-0">
                    <input
                      type="file"
                      id="imageUpload"
                      accept=".png, .jpg, .jpeg"
                      onChange={handleImageUpload} // Handle file input change
                      style={{ display: "none" }} // Hide the default file input
                    />
                    <label
                      htmlFor="imageUpload"
                      className="text-center border"
                      style={{
                        width: "42px",
                        height: "42px",
                        lineHeight: "40px",
                      }}
                    >
                      <i className="ri-camera-line position-relative fs-18"></i>
                    </label>
                  </div>
                  <div
                    className="avatar-preview rounded-circle"
                    style={{
                      border: "10px solid #fff",
                    }}
                  >
                    <div
                      id="imagePreview"
                      className="rounded-circle"
                      style={{
                        backgroundImage: `url(${imagePreview})`, // Use the uploaded image
                        backgroundSize: "cover",
                        backgroundPosition: "center",
                        width: "100%",
                        height: "100%",
                      }}
                    ></div>
                  </div>
                </div>
              </div>

              <div className="flex-grow-1 doctor-name">
                <h3 className="fs-20 fw-semibold mb-1">Walter White</h3>
                <span>
                  Patient ID: <span className="text-secondary">#P-3214</span>
                </span>
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>

      <Row>
        <Col lg={4}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <h3 className="fs-18 mb-3">Personal Information</h3>
              <ul className="ps-0 mb-0 list-unstyled last-child-none">
                <li className="mb-2">
                  <p>
                    Patient ID: <span className="text-secondary">#P3214</span>
                  </p>
                </li>
                <li className="mb-2">
                  <p>
                    Full Name:{" "}
                    <span className="text-secondary">Micheal collins</span>
                  </p>
                </li>
                <li className="mb-2">
                  <p>
                    Occupation: <span className="text-secondary">Teacher</span>
                  </p>
                </li>
                <li className="mb-2">
                  <p>
                    Age: <span className="text-secondary">65 Years</span>
                  </p>
                </li>
                <li className="mb-2">
                  <p>
                    Admitted On:{" "}
                    <span className="text-secondary">21 October, 2024</span>
                  </p>
                </li>
                <li className="mb-2">
                  <p>
                    Bed No: <span className="text-secondary">L2 - 205</span>
                  </p>
                </li>
              </ul>
            </Card.Body>
          </Card>

          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/email.png"
                    alt="email"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="flex-grow-1 ms-4">
                  <span className="d-block">Email</span>
                  <a
                    href="mailto:walter32@gmail.com"
                    className="fs-16 fw-bold text-body-color-50 text-decoration-none"
                  >
                    walter32@gmail.com
                  </a>
                </div>
              </div>
            </Card.Body>
          </Card>

          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/phone.png"
                    alt="phone"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="flex-grow-1 ms-4">
                  <span className="d-block">Phone No</span>
                  <a
                    href="tel:+14442665599"
                    className="fs-16 fw-bold text-body-color-50 text-decoration-none"
                  >
                    +1 444 266 5599
                  </a>
                </div>
              </div>
            </Card.Body>
          </Card>

          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/map.png"
                    alt="map"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="flex-grow-1 ms-4">
                  <span className="d-block">Address</span>
                  <div className="fs-16 fw-bold text-body-color-50 text-decoration-none">
                    S. Arrowhead Court Branford9
                  </div>
                </div>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col lg={8}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="pd-text-content p-4">
              <h3>Disease History</h3>
              <p>
                Molestie tincidunt ut consequat a urna tortor. Vitae velit ac
                nisl velit mauris placerat nisi placerat. Pellentesque viverra
                lorem malesuada nunc tristique sapien. Imperdiet sit hendrerit
                tincidunt bibendum donec adipiscing.
              </p>

              <div>
                <h3>Key Symptoms</h3>
                <ul>
                  <li>Molestie tincidunt ut consequat a urna tortor.</li>
                  <li>
                    Vitae velit ac nisl velit mauris placerat nisi placerat.
                    Pellentesque viverra lorem malesuada nunc tristique sapien.
                    Imperdiet sit hendrerit tincidunt bibendum donec adipiscing.
                  </li>
                  <li>
                    Ad minim veniam, quis nostrud exercitation ullamco laboris
                    nis
                  </li>
                  <li>
                    Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum
                    accusantium doloremque laudantium.
                  </li>
                  <li>
                    Ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                    fugit, sed quia consequuntur magni dolores eos qui ratione
                    voluptate.
                  </li>
                </ul>
              </div>
            </Card.Body>
          </Card>

          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="pd-text-content p-4">
              <h3>Note For Patient</h3>
              <p>
                Molestie tincidunt ut consequat a urna tortor. Vitae velit ac
                nisl velit mauris placerat nisi placerat. Pellentesque viverra
                lorem malesuada nunc tristique sapien. Imperdiet sit hendrerit
                tincidunt bibendum donec adipiscing.
              </p>

              <h3>Advice:</h3>
              <ul>
                <li>Molestie tincidunt ut consequat a urna tortor.</li>
                <li>
                  Vitae velit ac nisl velit mauris placerat nisi placerat.
                  Pellentesque viverra lorem malesuada nunc tristique sapien.
                  Imperdiet sit hendrerit tincidunt bibendum donec adipiscing.
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default PatientDetails;

"use client";

import React from "react";
import Image from "next/image";
import { Row, Col, Card, Button, Dropdown } from "react-bootstrap";

const ViewCampaign = () => {
  return (
    <>
      <div className="campaign-stepper-content">
        <div className="d-flex align-items-center mb-4 mb-md-5">
          <div className="flex-shrink-0">
            <Image
              src="/images/christmas.png"
              alt="christmas"
              width={50}
              height={50}
            />
          </div>
          <div className="flex-grow-1 ms-3">
            <h3 className="fs-24">Christmas Eve</h3>
            <span className="fs-16 fw-medium">From 10 Oct - 15 Oct, 24</span>
          </div>
        </div>

        <Row>
          <Col lg={4}>
            <Card className="border p-4 bg-border-color rounded-3 mb-4">
              <div className="d-flex justify-content-between align-items-center border-bottom border-body-bg pb-3 mb-3">
                <h4 className="fs-18 mb-0">Campaign Goal:</h4>

                <Dropdown className="action-opt">
                  <Dropdown.Toggle
                    className="btn bg-transparent p-0"
                    as="button"
                  >
                    <i className="ri-more-fill"></i>
                  </Dropdown.Toggle>
                  <Dropdown.Menu className="dropdown-menu-end bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="ri-time-line"></i> Today
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-eye-line"></i> View
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-delete-bin-line"></i> Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>
              <h4 className="fw-medium fs-14">Get more visitors</h4>
              <p>Increase impression traffic onto the platform</p>
            </Card>

            <Card className="border p-4 bg-border-color rounded-3 mb-4">
              <div className="d-flex justify-content-between align-items-center border-bottom border-body-bg pb-3 mb-3">
                <h4 className="fs-18 mb-0">Team Members:</h4>

                <Dropdown className="action-opt">
                  <Dropdown.Toggle
                    className="btn bg-transparent p-0"
                    as="button"
                  >
                    <i className="ri-more-fill"></i>
                  </Dropdown.Toggle>
                  <Dropdown.Menu className="dropdown-menu-end bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="ri-time-line"></i> Today
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-eye-line"></i> View
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-delete-bin-line"></i> Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-3">
                {["/images/user-90.png", "/images/user-91.png"].map(
                  (imgSrc, index) => (
                    <li key={index}>
                      <Button
                        variant="light"
                        className="border-0 p-2 d-flex align-items-center rounded-2"
                      >
                        <Image
                          src={imgSrc}
                          width={30}
                          height={30}
                          className="border border-white rounded-circle"
                          alt="user"
                        />
                        <span className="fw-medium ms-2 text-secondary">
                          Team Member {index + 1}
                        </span>
                      </Button>
                    </li>
                  )
                )}
              </ul>
            </Card>
          </Col>

          <Col lg={4}>
            <Card className="border p-4 bg-border-color rounded-3 mb-4">
              <div className="d-flex justify-content-between align-items-center border-bottom border-body-bg pb-3 mb-3">
                <h4 className="fs-18 mb-0">Audiences</h4>
                
                <Dropdown className="action-opt">
                  <Dropdown.Toggle
                    className="btn bg-transparent p-0"
                    as="button"
                  >
                    <i className="ri-more-fill"></i>
                  </Dropdown.Toggle>
                  <Dropdown.Menu className="dropdown-menu-end bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="ri-time-line"></i> Today
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-eye-line"></i> View
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-delete-bin-line"></i> Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <ul className="ps-0 mb-0 list-unstyled">
                <li className="border-bottom pb-2 mb-2 border-body-bg">
                  <span className="text-secondary fw-medium">Gender:</span> All
                </li>
                <li className="border-bottom pb-2 mb-2 border-body-bg">
                  <span className="text-secondary fw-medium">Age Range:</span>{" "}
                  18-60
                </li>
                <li className="border-bottom pb-2 mb-2 border-body-bg">
                  <span className="text-secondary fw-medium">Location:</span>{" "}
                  Canada, USA
                </li>
                <li>
                  <span className="text-secondary fw-medium">Media:</span>{" "}
                  Facebook, Instagram
                </li>
              </ul>
            </Card>
          </Col>

          <Col lg={4}>
            <Card className="border p-4 bg-border-color rounded-3 mb-4">
              <div className="d-flex justify-content-between align-items-center border-bottom border-body-bg pb-3 mb-3">
                <h4 className="fs-18 mb-0">Uploaded Files</h4>

                <Dropdown className="action-opt">
                  <Dropdown.Toggle
                    className="btn bg-transparent p-0"
                    as="button"
                  >
                    <i className="ri-more-fill"></i>
                  </Dropdown.Toggle>
                  <Dropdown.Menu className="dropdown-menu-end bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="ri-time-line"></i> Today
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-eye-line"></i> View
                    </Dropdown.Item>
                    <Dropdown.Item href="#">
                      <i className="ri-delete-bin-line"></i> Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom border-body-bg pb-4 mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/pdf.png" 
                      alt="pdf"
                      width={35}
                      height={35}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <h4 className="fs-16 mb-0">Campaign Requirements</h4>
                    <p>Increase impression traffic onto the platform</p>
                  </div>
                </div>

                <button
                  className="bg-white rounded-circle border-0"
                  style={{ width: "30px", height: "30px" }}
                >
                  <i className="ri-download-2-line text-primary fs-16"></i>
                </button>
              </div>

              <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom border-body-bg pb-4 mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/doc.png" 
                      alt="doc"
                      width={35}
                      height={35}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <h4 className="fs-16 mb-0">
                      Campaign’s mission and vision
                    </h4>
                    <p>Increase impression traffic onto the platform</p>
                  </div>
                </div>

                <button
                  className="bg-white rounded-circle border-0"
                  style={{ width: "30px", height: "30px" }}
                >
                  <i className="ri-download-2-line text-primary fs-16"></i>
                </button>
              </div>

              <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom border-body-bg pb-4 mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/xl4.png" 
                      alt="xl4"
                      width={35}
                      height={35}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <h4 className="fs-16 mb-0">Campaign Banner</h4>
                    <p>Increase impression traffic onto the platform</p>
                  </div>
                </div>

                <button
                  className="bg-white rounded-circle border-0"
                  style={{ width: "30px", height: "30px" }}
                >
                  <i className="ri-download-2-line text-primary fs-16"></i>
                </button>
              </div>
              
              <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/jpg.png" 
                      alt="pdf"
                      width={35}
                      height={35}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <h4 className="fs-16 mb-0">Campaign Image</h4>
                    <p>Increase impression traffic onto the platform</p>
                  </div>
                </div>

                <button
                  className="bg-white rounded-circle border-0"
                  style={{ width: "30px", height: "30px" }}
                >
                  <i className="ri-download-2-line text-primary fs-16"></i>
                </button>
              </div>
            </Card>
          </Col>
        </Row>
      </div>
    </>
  );
};

export default ViewCampaign;

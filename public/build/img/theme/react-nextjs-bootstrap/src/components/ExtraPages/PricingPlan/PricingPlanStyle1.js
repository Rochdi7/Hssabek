"use client";

import { Row, Col, Card } from "react-bootstrap";

const PricingPlanStyle1 = () => {
  return (
    <>
      <Row className="justify-content-center">
        <Col sm={6} lg={6}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4 position-relative">
              <Row className="align-items-center">
                <Col lg={6}>
                  <span className="border py-2 px-3 rounded-3 d-inline-block mb-3">
                    Standard
                  </span>
                  <h2 className="fs-36 fw-medium mb-2 mb-lg-3">
                    $89.<sub className="fs-24 fw-normal bottom-0">99</sub>
                  </h2>
                  <p className="fw-medium mb-2 mb-lg-4 pb-lg-1">
                    For individual user
                  </p>
                  <a
                    href="#"
                    className="btn btn-primary fs-16 fw-medium rounded-3"
                  >
                    <i className="ri-arrow-right-s-line fs-20"></i>
                    <span>Buy Now</span>
                  </a>
                </Col>

                <Col lg={6}>
                  <ul className="ps-0 mb-0 mt-3 mt-lg-0 list-unstyled priceing-border">
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Advanced Dashboard</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Task Management</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">File Storage (5GB)</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Email Integration</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Mobile App Access</span>
                    </li>
                    <li>
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Custom Branding</span>
                    </li>
                  </ul>
                </Col>
              </Row>

              <span className="btn btn-danger p-2 d-inline-block text-white position-absolute popular-tag fs-12">
                Most Popular
              </span>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={6}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4 position-relative">
              <Row className="align-items-center">
                <Col lg={6}>
                  <span className="border py-2 px-3 rounded-3 d-inline-block mb-3">
                    Premium
                  </span>
                  <h2 className="fs-36 fw-medium mb-2 mb-lg-3">
                    $119.<sub className="fs-24 fw-normal bottom-0">99</sub>
                  </h2>
                  <p className="fw-medium mb-2 mb-lg-4 pb-lg-1">
                    For team of 10 users
                  </p>
                  <a
                    href="#"
                    className="btn btn-primary fs-16 fw-medium rounded-3"
                  >
                    <i className="ri-arrow-right-s-line fs-20"></i>
                    <span>Buy Now</span>
                  </a>
                </Col>

                <Col lg={6}>
                  <ul className="ps-0 mb-0 mt-3 mt-lg-0 list-unstyled priceing-border">
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Advanced Dashboard</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Task Management</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">File Storage (Unlimited)</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">Custom Reporting</span>
                    </li>
                    <li className="mb-2">
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">24/7 Premium Support</span>
                    </li>
                    <li>
                      <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                      <span className="ms-2">White-label Solution</span>
                    </li>
                  </ul>
                </Col>
              </Row>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default PricingPlanStyle1;

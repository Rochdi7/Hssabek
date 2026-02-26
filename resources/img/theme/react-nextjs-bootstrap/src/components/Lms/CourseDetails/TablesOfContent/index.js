"use client";

import { Row, Col, Card, Accordion } from "react-bootstrap";
import Link from "next/link";

const TablesOfContent = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-4">Tables Of Content</h3>

          <Row className="align-items-center">
            <Col lg={7}>
              <Accordion className="course-accordion" defaultActiveKey="0">
                <Accordion.Item
                  className="border-0 rounded-3 mb-3"
                  eventKey="0"
                >
                  <Accordion.Header className="rounded-3 p-2">
                    <div className="fs-15 fw-semibold text-secondary rounded-3">
                      Introduction to Cybersecurity
                    </div>
                  </Accordion.Header>

                  <Accordion.Body className="pt-0">
                    <ul className="mt-2 ps-0 mb-0 list-unstyled">
                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            info
                          </span>

                          <span className="ms-2">Course Introduction</span>
                        </div>
                        <span>2m 24s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            play_circle
                          </span>

                          <span className="ms-2">
                            Cyber Security Introduction
                          </span>
                        </div>
                        <span>0m 46s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            list
                          </span>
                          <span className="ms-2">
                            What is Cyber Security and the CIA Triad
                          </span>
                        </div>
                        <span>3m 32s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            star
                          </span>
                          <span className="ms-2">
                            Threat Actors: Who are They?
                          </span>
                        </div>
                        <span>2m 2s</span>
                      </li>

                      <li className="d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            hotel_class
                          </span>
                          <span className="ms-2">Types of Threat Actors</span>
                        </div>
                        <span>2m 13s</span>
                      </li>
                    </ul>
                  </Accordion.Body>
                </Accordion.Item>

                <Accordion.Item
                  className="border-0 rounded-3 mb-3"
                  eventKey="1"
                >
                  <Accordion.Header className="rounded-3 p-2">
                    <div className="fs-15 fw-semibold text-secondary rounded-3">
                      Secure Networking
                    </div>
                  </Accordion.Header>

                  <Accordion.Body className="pt-0">
                    <ul className="mt-2 ps-0 mb-0 list-unstyled">
                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            info
                          </span>
                          <span className="ms-2">
                            Network Security Introduction
                          </span>
                        </div>
                        <span>2m 24s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            hotel_class
                          </span>
                          <span className="ms-2">
                            Introduction to Wired and Wireless Networks
                          </span>
                        </div>
                        <span>0m 46s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            list
                          </span>
                          <span className="ms-2">
                            Wired Network Vulnerabilities and How to Protect
                            Wired Networks
                          </span>
                        </div>
                        <span>3m 32s</span>
                      </li>

                      <li className="d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            star
                          </span>
                          <span className="ms-2">
                            Wireless Network Vulnerabilities and How to Protect
                            Wireless Networks
                          </span>
                        </div>
                        <span>2m 2s</span>
                      </li>
                    </ul>
                  </Accordion.Body>
                </Accordion.Item>

                <Accordion.Item
                  className="border-0 rounded-3 mb-3"
                  eventKey="2"
                >
                  <Accordion.Header className="rounded-3 p-2">
                    <div className="fs-15 fw-semibold text-secondary rounded-3">
                      Secure E-Mail
                    </div>
                  </Accordion.Header>

                  <Accordion.Body className="pt-0">
                    <ul className="mt-2 ps-0 mb-0 list-unstyled">
                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            info
                          </span>
                          <span className="ms-2">
                            E-Mail Security Introduction
                          </span>
                        </div>
                        <span>2m 24s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            play_circle
                          </span>
                          <span className="ms-2">
                            E-Mail: Overview and Importance
                          </span>
                        </div>
                        <span>0m 46s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            list
                          </span>
                          <span className="ms-2">
                            Phishing: Techniques, Implications and How to Spot
                          </span>
                        </div>
                        <span>3m 32s</span>
                      </li>

                      <li className="d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            star
                          </span>
                          <span className="ms-2">
                            Understanding E-Mail Headers for Verification
                          </span>
                        </div>
                        <span>2m 2s</span>
                      </li>
                    </ul>
                  </Accordion.Body>
                </Accordion.Item>

                <Accordion.Item
                  className="border-0 rounded-3 mb-3"
                  eventKey="3"
                >
                  <Accordion.Header className="rounded-3 p-2">
                    <div className="fs-15 fw-semibold text-secondary rounded-3">
                      Secure Internet Browsing
                    </div>
                  </Accordion.Header>

                  <Accordion.Body className="pt-0">
                    <ul className="mt-2 ps-0 mb-0 list-unstyled">
                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            info
                          </span>
                          <span className="ms-2">
                            Internet Security Introduction
                          </span>
                        </div>
                        <span>2m 24s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            play_circle
                          </span>

                          <span className="ms-2">
                            Exploring Web-Based Threats
                          </span>
                        </div>
                        <span>0m 46s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            list
                          </span>
                          <span className="ms-2">
                            Typo Squatting: Risks and Mitigation
                          </span>
                        </div>
                        <span>3m 32s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            star
                          </span>
                          <span className="ms-2">
                            Watering Hole Attacks: Tactics and Countermeasures
                          </span>
                        </div>
                        <span>2m 2s</span>
                      </li>

                      <li className="d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            hotel_class
                          </span>
                          <span className="ms-2">
                            Secure Browsing Best Practices
                          </span>
                        </div>
                        <span>2m 13s</span>
                      </li>
                    </ul>
                  </Accordion.Body>
                </Accordion.Item>

                <Accordion.Item className="border-0 rounded-3" eventKey="4">
                  <Accordion.Header className="rounded-3 p-2">
                    <div className="fs-15 fw-semibold text-secondary rounded-3">
                      Device Security & Password Management
                    </div>
                  </Accordion.Header>

                  <Accordion.Body className="pt-0">
                    <ul className="mt-2 ps-0 mb-0 list-unstyled">
                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            info
                          </span>
                          <span className="ms-2">
                            Device Security Introduction
                          </span>
                        </div>
                        <span>2m 24s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            play_circle
                          </span>
                          <span className="ms-2">
                            Securing Computers, Laptops, and Mobile Devices
                          </span>
                        </div>
                        <span>0m 46s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            list
                          </span>
                          <span className="ms-2">Password Best Practices</span>
                        </div>
                        <span>3m 32s</span>
                      </li>

                      <li className="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            star
                          </span>
                          <span className="ms-2">
                            Multi-Factor Authentication (MFA)
                          </span>
                        </div>
                        <span>2m 2s</span>
                      </li>

                      <li className="d-flex justify-content-between align-items-center flex-wrap gap-1">
                        <div className="d-flex align-items-center">
                          <span className="material-symbols-outlined fs-20 text-primary position-relative top-1">
                            hotel_class
                          </span>
                          <span className="ms-2">
                            Keeping Devices Up-to-Date
                          </span>
                        </div>
                        <span>2m 13s</span>
                      </li>
                    </ul>
                  </Accordion.Body>
                </Accordion.Item>
              </Accordion>
            </Col>

            <Col lg={5} className="text-center">
              <Card className="bg-primary border-0 rounded-3 text-center d-inline-block mt-4 mt-lg-0">
                <Card.Body className="p-4 p-sm-5 mx-xxl-5 rounded-10">
                  <h3 className="fs-20 mb-2 text-white">Unlock Library</h3>

                  <p className="text-white mb-4">
                    Get access to all videos in the library
                  </p>

                  <Link
                    href="#"
                    className="btn btn-primary bg-white bg-opacity-10 text-white fs-16 py-2 py-md-3 px-3 px-md-4 fw-medium mb-3"
                  >
                    Sign Up - Only $120/mo
                  </Link>

                  <p className="fs-14 text-white">
                    Have an account?{" "}
                    <Link
                      href="#"
                      className="fw-semibold text-white text-decoration-none"
                    >
                      Login
                    </Link>
                  </p>
                </Card.Body>
              </Card>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default TablesOfContent;

"use client";

import { Row, Col, Dropdown, Card, Form } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const TeamMembers = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <Form className="position-relative table-src-form me-0">
              <input
                type="text"
                className="form-control"
                placeholder="Search here"
              />
              <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>

            <Link
              href="/users/add-user/"
              className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line d-none d-sm-inline-block"></i>
                <span>Add New User</span>
              </span>
            </Link>
          </div>
        </Card.Body>
      </Card>

      <Row>
        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-60.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Ava Turner
                    </div>
                    <span className="d-block">Business Analyst</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">01 Jan 2024</span>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">turner@trezo.com</span>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-445-4455</span>
              </div>

              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Washington D.C</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-61.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Ethan Parker
                    </div>
                    <span className="d-block">Project Manager</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">10 Jan 2024</span>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">parker@trezo.com</span>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-445-7788</span>
              </div>

              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">San Diego</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-62.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Isabella Lee
                    </div>
                    <span className="d-block">Team Leader</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">20 Jan 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">lee@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-333-2288</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Los Angeles</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-63.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Thompson Torres
                    </div>
                    <span className="d-block">Designer</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">01 Feb 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">torres@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-444-3355</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Boston</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-64.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Lucas Lyon
                    </div>
                    <span className="d-block">Technical Writer</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">10 Feb 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">lucas@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-455-9966</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Chicago</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-65.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Morgan Sturges
                    </div>
                    <span className="d-block">Data Analyst</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">01 Mar 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">morgan@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-225-7755</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Las Vegas</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-66.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Sophia McNeel
                    </div>
                    <span className="d-block">Sales Representative</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">15 Mar 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">sophia@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-444-8822</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">San Francisco</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-67.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Rodriguez Meade
                    </div>
                    <span className="d-block">Manager</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">01 Apr 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">meade@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-455-4411</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Houston</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-68.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Michael Mackenzie
                    </div>
                    <span className="d-block">Web Developer</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">10 Apr 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">michael@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-555-9922</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Oklahoma City</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-69.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Charles Tharp
                    </div>
                    <span className="d-block">Accountant</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">01 May 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">charles@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-433-2255</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Austin</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-60.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Tina Bell
                    </div>
                    <span className="d-block">Executive Assistant</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">10 May 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">tina@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-444-3399</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">Portland</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-4">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-61.jpg"
                      className="wh-65 rounded-circle"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="text-decoration-none text-secondary fw-medium fs-16">
                      Melvin Larocque
                    </div>
                    <span className="d-block">Business Analyst</span>
                  </div>
                </div>

                <Dropdown className="action-opt ms-2 position-relative top-3">
                  <Dropdown.Toggle
                    variant="secondary"
                    id="dropdown-basic"
                    className="bg-transparent p-0"
                  >
                    <span className="material-symbols-outlined">
                      more_horiz
                    </span>
                  </Dropdown.Toggle>

                  <Dropdown.Menu className="bg-white border box-shadow">
                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">visibility</i>
                      View
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <span className="material-symbols-outlined">edit</span>
                      Edit
                    </Dropdown.Item>

                    <Dropdown.Item href="#">
                      <i className="material-symbols-outlined">delete</i>
                      Delete
                    </Dropdown.Item>
                  </Dropdown.Menu>
                </Dropdown>
              </div>

              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Joined Date:</span>
                <span className="ms-1">01 Jun 2024</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Email Address:</span>
                <span className="ms-1">melvin@trezo.com</span>
              </div>
              <div className="d-flex align-items-center mb-2 pb-1">
                <span className="text-secondary">Phone Number:</span>
                <span className="ms-1">+1 555-445-5855</span>
              </div>
              <div className="d-flex align-items-center mb-4">
                <span className="text-secondary">Location:</span>
                <span className="ms-1">San Diego</span>
              </div>

              <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2">
                <li>
                  <a
                    href="https://www.facebook.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#3a559f" }}
                  >
                    <i className="ri-facebook-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.twitter.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#03a9f4" }}
                  >
                    <i className="ri-twitter-x-line text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.linkedin.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#007ab9" }}
                  >
                    <i className="ri-linkedin-fill text-white"></i>
                  </a>
                </li>
                <li>
                  <a
                    href="https://www.google.com/"
                    target="_blank"
                    className="text-decoration-none wh-30 d-inline-block lh-30 text-center rounded-circle text-white transition-y"
                    style={{ backgroundColor: "#2196f3" }}
                  >
                    <i className="ri-mail-line text-white"></i>
                  </a>
                </li>
              </ul>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default TeamMembers;

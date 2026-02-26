"use client";

import { Row, Col, Dropdown, Card, ProgressBar } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const Teams = () => {
  return (
    <>
      <Row>
        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-60.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Ava Turner</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#F3E8FF" }}
              >
                Project Management
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">85%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={85}
                  style={{
                    height: "4px",
                  }}
                />
              </div>

              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-61.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Ethan Parker</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#DAEBFF" }}
              >
                eCommerce Theme
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">45%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={45}
                  style={{
                    height: "4px",
                  }}
                />
              </div>
              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-62.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Isabella</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#D8FFC8" }}
              >
                Shopify Theme Dev
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">70%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={70}
                  style={{
                    height: "4px",
                  }}
                />
              </div>
              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-63.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Thompson</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#FFE8D4" }}
              >
                Oito - HTM
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">90%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={90}
                  style={{
                    height: "4px",
                  }}
                />
              </div>
              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-64.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Lucas</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#D8FFC8" }}
              >
                Tanus - Template
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">75%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={75}
                  style={{
                    height: "4px",
                  }}
                />
              </div>
              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-64.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Morgan</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#F3E8FF" }}
              >
                Delft - TypeScript
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">65%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={65}
                  style={{
                    height: "4px",
                  }}
                />
              </div>
              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-66.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Sophia</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#DAEBFF" }}
              >
                Trezo - Angular
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>

                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">95%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={95}
                  style={{
                    height: "4px",
                  }}
                />
              </div>
              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center mb-3">
                <div className="d-flex align-items-center">
                  <div className="flex-shrink-0">
                    <Image
                      src="/images/user-67.jpg"
                      className="wh-65 rounded-circle border border-2"
                      alt="user"
                      width={65}
                      height={65}
                    />
                  </div>
                  <div className="flex-grow-1 ms-2 position-relative top-2">
                    <h4 className="fs-16 fw-semibold mb-1">Rodriguez</h4>
                    <span>Team Leader</span>
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

              <span
                className="d-block py-2 px-3 text-center rounded-pill fw-medium text-secondary mb-3 bg-for-dark-mode"
                style={{ backgroundColor: "#F3E8FF" }}
              >
                eLearniv - React
              </span>

              <span className="d-block text-center text-body mb-3">
                Team Members
              </span>

              <div className="d-flex flex-wrap justify-content-center mb-3">
                <div className="ms-m-15">
                  <Image
                    src="/images/user-52.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-54.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-55.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="ms-m-15">
                  <Image
                    src="/images/user-56.jpg"
                    className="wh-40 rounded-circle border border-2"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>

              <div className="mb-4 pb-md-2">
                <div className="d-flex justify-content-between mb-2">
                  <span className="fw-medium d-block">New Order</span>
                  <span className="fw-medium d-block">80%</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={80}
                  style={{
                    height: "4px",
                  }}
                />
              </div>
              <Link
                href="#"
                className="btn btn-outline-primary fw-medium w-100 py-2 rounded-3"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={12} lg={12} xxl={12}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span className="fs-12 fw-medium">
                  Showing 09 of 30 Results
                </span>

                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li className="page-item">
                      <Link
                        className="page-link icon"
                        href="#"
                        aria-label="Previous"
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_left
                        </span>
                      </Link>
                    </li>
                    <li className="page-item">
                      <a className="page-link active" href="teams.html">
                        1
                      </a>
                    </li>
                    <li className="page-item">
                      <a className="page-link" href="teams.html">
                        2
                      </a>
                    </li>
                    <li className="page-item">
                      <a className="page-link" href="teams.html">
                        3
                      </a>
                    </li>
                    <li className="page-item">
                      <a className="page-link" href="teams.html">
                        4
                      </a>
                    </li>
                    <li className="page-item">
                      <Link
                        className="page-link icon"
                        href="#"
                        aria-label="Next"
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_right
                        </span>
                      </Link>
                    </li>
                  </ul>
                </nav>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default Teams;

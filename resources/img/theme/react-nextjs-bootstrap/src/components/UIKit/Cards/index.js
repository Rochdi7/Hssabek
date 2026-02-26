"use client";

import { Row, Col, Card } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const Cards = () => {
  return (
    <>
      <Row>
        <Col sm={6} md={6} lg={4} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="mb-4">
                <span className="badge bg-primary bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Primary
                </span>{" "}
                <span className="badge bg-success bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Success
                </span>
              </div>

              <h3 className="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
              <p className="mb-20">
                When you enter into any new area of science, you almost always
                find.
              </p>

              <Link
                href="#"
                className="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} md={6} lg={4} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="mb-4">
                <span className="badge bg-primary bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Primary
                </span> {" "}
                <span className="badge bg-success bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Success
                </span>
              </div>

              <h3 className="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
              <p className="mb-20">
                When you enter into any new area of science, you almost always
                find.
              </p>

              <Link
                href="#"
                className="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} md={6} lg={4} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="mb-4">
                <span className="badge bg-primary bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Primary
                </span> {" "}
                <span className="badge bg-success bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Success
                </span>
              </div>

              <h3 className="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
              <p className="mb-20">
                When you enter into any new area of science, you almost always
                find.
              </p>

              <Link
                href="#"
                className="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} md={6} lg={4} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="mb-4">
                <span className="badge bg-primary bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Primary
                </span> {" "}
                <span className="badge bg-success bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Success
                </span>
              </div>

              <h3 className="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
              <p className="mb-20">
                When you enter into any new area of science, you almost always
                find.
              </p>

              <Link
                href="#"
                className="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} md={6} lg={4} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="mb-4">
                <span className="badge bg-primary bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Primary
                </span> {" "}
                <span className="badge bg-success bg-opacity-50 rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                  Success
                </span>
              </div>

              <Image
                src="/images/card-1.jpg"
                className="mb-4 rounded-3"
                alt="card"
                width={1017}
                height={528}
              />

              <h3 className="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
              <p className="mb-20">
                When you enter into any new area of science, you almost always
                find.
              </p>

              <Link
                href="#"
                className="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg"
              >
                View Details
              </Link>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} md={6} lg={4} xl={4} xxl={3}>
          <Card className="text-bg-dark border-0 rounded-3">
            <Image
              src="/images/card-2.jpg"
              className="card-img"
              alt="card"
              width={1137}
              height={1266}
            />

            <div className="position-absolute top-0 p-3">
              <span className="badge bg-primary rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                Primary
              </span> {" "}
              <span className="badge bg-warning rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                Warning
              </span> {" "}
              <span className="badge bg-success rounded-1 text-dark py-2 px-3 fs-13 fw-medium">
                Success
              </span>
            </div>

            <div
              className="card-img-overlay"
              style={{ top: "auto", bottom: "0" }}
            >
              <h5 className="card-title">Card title</h5>
              <p className="card-text">
                This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit
                longer.
              </p>
              <p className="card-text">
                <small>Last updated 3 mins ago</small>
              </p>
            </div>
          </Card>
        </Col>

        <Col sm={6} md={6} lg={4} xl={4} xxl={3}>
          <Card className="bg-white">
            <div className="card-header fs-16 fw-semibold">Featured</div>
            <ul className="list-group list-group-flush p-0">
              <li className="list-group-item">An item</li>
              <li className="list-group-item">A second item</li>
              <li className="list-group-item">A third item</li>
            </ul>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default Cards;

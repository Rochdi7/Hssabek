"use client";

import { Row, Col, Card } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const Clients = () => {
  return (
    <>
      <Row>
        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-1.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">CodeCraft</h4>
                <span>info@codecraft.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">
                    Olivia Taylor
                  </span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 555-5555
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">12</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@codecraft.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-2.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">ByteSavvy</h4>
                <span>info@bytesavvy.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">David Smith</span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 123-4567
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">16</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@bytesavvy.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-3.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">DataTech</h4>
                <span>info@datatech.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">
                    Alice Johnson
                  </span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 234-5678
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">07</span>
                </li>
              </ul>
              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@datatech.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-4.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">CyberByte</h4>
                <span>info@cyberbyte.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">Emily Brown</span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 345-6789
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">05</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@cyberbyte.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-5.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">NetGen</h4>
                <span>info@netgen.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">James Wilson</span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 456-7890
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">14</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@netgen.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-6.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">TechFuse</h4>
                <span>info@techfuse.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">
                    Michael Jones
                  </span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 567-8901
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">18</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@techfuse.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-7.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">CodeGen</h4>
                <span>info@codegen.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">
                    Sophia Martinez
                  </span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 678-9012
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">34</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@techfuse.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-8.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">WebWiz</h4>
                <span>info@webwiz.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">
                    William Davis
                  </span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 789-0123
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">08</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@webwiz.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-9.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">ByteTech</h4>
                <span>info@bytetech.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">Ava Anderson</span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 890-1234
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">03</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@bytetech.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-10.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">CloudFlex</h4>
                <span>info@cloudflex.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">Ethan Thomas</span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 901-2345
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">10</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@cloudflex.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-11.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">WebWorx</h4>
                <span>info@webWorx.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">
                    Isabella Clark
                  </span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 012-3456
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">25</span>
                </li>
              </ul>
              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@webWorx.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} lg={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <div className="d-flex">
              <div className="flex-shrink-0">
                <div className="bg-body pe-3 pb-3 bg-for-dark-mode">
                  <Image
                    src="/images/client-12.jpg"
                    className="wh-80 rounded-3"
                    alt="client"
                    width={80}
                    height={80}
                  />
                </div>
              </div>
              <div className="flex-grow-1 p-20 pb-0">
                <h4 className="mb-1 fs-16 fw-semibold">TechSync</h4>
                <span>info@techsync.com</span>
              </div>
            </div>

            <Card.Body className="p-4">
              <ul className="ps-0 mb-4 list-unstyled">
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Name:</span>
                  <span className="fw-medium text-secondary">
                    Alexander Lewis
                  </span>
                </li>
                <li className="mb-2 pb-1">
                  <span className="fw-medium me-1">Phone:</span>
                  <span className="fw-medium text-secondary">
                    (555) 210-9876
                  </span>
                </li>
                <li className="mb-0">
                  <span className="fw-medium me-1">Projects:</span>
                  <span className="fw-medium text-secondary">15</span>
                </li>
              </ul>

              <div className="d-flex align-items-center">
                <a
                  href="mailto:info@techsync.com"
                  className="btn btn-primary py-2 fw-medium"
                >
                  Message
                </a>
                <Link
                  href="#"
                  className="btn btn-outline-primary py-2 fw-medium ms-3"
                >
                  View Project
                </Link>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default Clients;

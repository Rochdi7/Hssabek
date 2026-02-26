"use client";

import { Card} from "react-bootstrap";
import Image from "next/image";

const PricingPlanStyle3 = () => {
  return (
    <>
      <div className="card-group">
        <Card className="bg-white border-0 mb-4">
          <Card.Body className="p-4 position-relative priceing-border style-two">
            <div className="text-center mb-4">
              <span className="border py-2 px-3 rounded-3 d-inline-block mb-3">
                Basic
              </span>
              <h2 className="fs-36 fw-medium mb-2 mb-lg-3">
                $29{" "}
                <sub className="fs-16 fw-normal bottom-0 text-body">
                  / per month
                </sub>
              </h2>
              <p className="fw-medium mb-2 mb-lg-4 pb-lg-1">
                For individual user
              </p>
              <a
                href="#"
                className="btn btn-primary fs-16 fw-medium pe-3 rounded-3 w-100"
              >
                <i className="ri-arrow-right-s-line fs-20 position-relative top-1"></i>
                <span>Buy Now</span>
              </a>
            </div>

            <ul className="ps-0 mb-0 mt-3 mt-lg-0 list-unstyled">
              <li className="mb-2">
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">Basic Dashboard</span>
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
                <span className="ms-2">Basic Reporting</span>
              </li>
              <li className="mb-2">
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">Email Integration</span>
              </li>
              <li>
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">Basic Support</span>
              </li>
            </ul>
          </Card.Body>
        </Card>

        <Card className="bg-white border-0 mb-4">
          <Card.Body className="p-4 position-relative priceing-border style-two">
            <div className="text-center mb-4">
              <span className="border py-2 px-3 rounded-3 d-inline-block mb-3">
                Standard
              </span>
              <h2 className="fs-36 fw-medium mb-2 mb-lg-3">
                $49.{" "}
                <sub className="fs-16 fw-normal bottom-0 text-body">
                  / per month
                </sub>
              </h2>
              <p className="fw-medium mb-2 mb-lg-4 pb-lg-1">
                For team of 10 users
              </p>
              <a
                href="#"
                className="btn btn-primary fs-16 fw-medium pe-3 rounded-3 w-100"
              >
                <i className="ri-arrow-right-s-line fs-20 position-relative top-1"></i>
                <span>Buy Now</span>
              </a>
            </div>

            <ul className="ps-0 mb-0 mt-3 mt-lg-0 list-unstyled">
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
                <span className="ms-2">File Storage (10GB)</span>
              </li>
              <li className="mb-2">
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">Advanced Reporting</span>
              </li>
              <li className="mb-2">
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">Email Integration</span>
              </li>
              <li>
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">Priority Support</span>
              </li>
            </ul>

            <Image
              src="/images/popular.svg"
              className="position-absolute populartsgs"
              alt="popular"
              width={80}
              height={80}
            />
          </Card.Body>
        </Card>

        <Card className="bg-white border-0 mb-4">
          <Card.Body className="p-4 position-relative priceing-border style-two">
            <div className="text-center mb-4">
              <span className="border py-2 px-3 rounded-3 d-inline-block mb-3">
                Premium
              </span>
              <h2 className="fs-36 fw-medium mb-2 mb-lg-3">
                $79.{" "}
                <sub className="fs-16 fw-normal bottom-0 text-body">
                  / per month
                </sub>
              </h2>
              <p className="fw-medium mb-2 mb-lg-4 pb-lg-1">
                For team of 15 users
              </p>
              <a
                href="#"
                className="btn btn-primary fs-16 fw-medium pe-3 rounded-3 w-100"
              >
                <i className="ri-arrow-right-s-line fs-20 position-relative top-1"></i>
                <span>Buy Now</span>
              </a>
            </div>

            <ul className="ps-0 mb-0 mt-3 mt-lg-0 list-unstyled">
              <li className="mb-2">
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">Customizable Dashboard</span>
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
                <span className="ms-2">Email Integration</span>
              </li>
              <li>
                <i className="ri-check-line fs-20 text-success position-relative top-2"></i>
                <span className="ms-2">24/7 Premium Support</span>
              </li>
            </ul>
          </Card.Body>
        </Card>
      </div>
    </>
  );
};

export default PricingPlanStyle3;

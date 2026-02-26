"use client";

import { Card } from "react-bootstrap";
import Image from "next/image"; 

const SingleUserExample = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Single User Example</h4>

          <div className="d-sm-flex justify-content-between align-items-center">
            <div className="d-flex align-items-center mb-3 mb-sm-0">
              <div className="flex-shrink-0">
                <Image
                  src="/images/user-62.jpg"
                  className="wh-60 rounded-circle"
                  alt="user"
                  width={60}
                  height={60}
                />
              </div>
              <div className="flex-grow-1 ms-3">
                <h4 className="fs-16 fw-semibold mb-1">Andrew Burns</h4>
                <span className="fs-14">Programmer</span>
              </div>
            </div>

            <ul className="ps-0 mb-0 list-unstyled d-flex gap-2">
              <li>
                <a
                  href="https://www.facebook.com/"
                  target="_blank"
                  className="text-decoration-none wh-40 bg-primary bg-opacity-10 d-block text-center position-relative rounded-circle text-primary hover-bg"
                >
                  <i className="ri-facebook-fill position-absolute top-50 start-50 translate-middle fs-18"></i>
                </a>
              </li>

              <li>
                <a
                  href="https://www.twitter.com/"
                  target="_blank"
                  className="text-decoration-none wh-40 bg-primary bg-opacity-10 d-block text-center position-relative rounded-circle text-primary hover-bg"
                >
                  <i className="ri-twitter-x-line position-absolute top-50 start-50 translate-middle fs-18"></i>
                </a>
              </li>

              <li>
                <a
                  href="https://www.linkedin.com/"
                  target="_blank"
                  className="text-decoration-none wh-40 bg-primary bg-opacity-10 d-block text-center position-relative rounded-circle text-primary hover-bg"
                >
                  <i className="ri-linkedin-fill position-absolute top-50 start-50 translate-middle fs-18"></i>
                </a>
              </li>
            </ul>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SingleUserExample;

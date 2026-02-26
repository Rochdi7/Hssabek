"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link"; 

const SingleUserWithBadgeExample = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Single User With Badge Example</h4>

          <div className="d-flex justify-content-between">
            <ul className="ps-0 mb-0 list-unstyled d-flex align-items-center gap-1">
              <li>
                <div className="position-relative d-block">
                  <Image
                    src="/images/user-1.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                  <div className="position-absolute top-0 end-0 p-1 bg-success border border-2 border-white rounded-circle"></div>
                </div>
              </li>

              <li>
                <div className="position-relative d-block">
                  <Image
                    src="/images/user-2.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                  <div className="position-absolute top-0 end-0 p-1 bg-primary border border-2 border-white rounded-circle"></div>
                </div>
              </li>

              <li>
                <div className="position-relative d-block">
                  <Image
                    src="/images/user-3.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                  <div className="position-absolute top-0 end-0 p-1 bg-warning border border-2 border-white rounded-circle"></div>
                </div>
              </li>
            </ul>

            <Link
              href="#"
              className="btn bg-primary bg-opacity-10 fw-bold fs-14 hover-bg"
            >
              <span className="position-relative top-2">View Details</span>
            </Link>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SingleUserWithBadgeExample;

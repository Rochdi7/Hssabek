"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link"; 

const GroupUserExample = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Group User Example</h4>

          <div className="d-flex justify-content-between">
            <ul className="ps-0 mb-0 list-unstyled d-flex align-items-center">
              <li className="ms-m-15">
                <Image
                  src="/images/user-1.jpg"
                  className="wh-40 rounded-circle border border-2 border-color-white"
                  alt="user"
                  width={40}
                  height={40}
                />
              </li>

              <li className="ms-m-15">
                <Image
                  src="/images/user-2.jpg"
                  className="wh-40 rounded-circle border border-2 border-color-white"
                  alt="user"
                  width={40}
                  height={40}
                />
              </li>

              <li className="ms-m-15">
                <Image
                  src="/images/user-3.jpg"
                  className="wh-40 rounded-circle border border-2 border-color-white"
                  alt="user"
                  width={40}
                  height={40}
                />
              </li>

              <li className="ms-m-15">
                <div className="wh-40 rounded-circle bg-primary d-block text-center position-relative text-decoration-none text-white hover-bg">
                  <i className="ri-add-line fs-20 position-absolute top-50 start-50 translate-middle"></i>
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

export default GroupUserExample;

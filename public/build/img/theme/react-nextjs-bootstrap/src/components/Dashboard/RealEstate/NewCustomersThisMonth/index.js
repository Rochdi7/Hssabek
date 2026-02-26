"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const NewCustomersThisMonth = () => {
  return (
    <>
      <div
        className="bg-white rounded-3 mb-4"
        style={{
          background: "linear-gradient(73deg, #23272E 0%, #343A46 100%)",
        }}
      >
        <Card.Body className="p-4">
          <div className="mb-3 pb-2">
            <span className="d-block mb-2" style={{ color: "#8695AA" }}>
              New Customers This Month
            </span>
            <h3 className="text-white mb-0 fs-20">4,712</h3>
          </div>

          <span className="d-block mb-2" style={{ color: "#8695AA" }}>
            Join Today
          </span>

          <ul className="ps-0 mb-0 list-unstyled d-flex align-items-center">
            <li>
              <Image
                src="/images/user-63.jpg"
                className="rounded-circle border border-1 border-color-white"
                alt="user"
                width={40}
                height={40}
              />
            </li>
            <li className="ms-m-15">
              <Image
                src="/images/user-64.jpg"
                className="rounded-circle border border-1 border-color-white"
                alt="user"
                width={40}
                height={40}
              />
            </li>
            <li className="ms-m-15">
              <Image
                src="/images/user-65.jpg"
                className="rounded-circle border border-1 border-color-white"
                alt="user"
                width={40}
                height={40}
              />
            </li>
            <li className="ms-m-15">
              <Image
                src="/images/user-66.jpg"
                className="rounded-circle border border-1 border-color-white"
                alt="user"
                width={40}
                height={40}
              />
            </li>
            <li className="ms-m-15">
              <div
                className="rounded-circle d-block text-center text-decoration-none text-white fs-14 fw-bold border border-1 border-color-white"
                style={{
                  backgroundColor: "#FE7A36",
                  width: "40px",
                  height: "40px",
                  lineHeight: "40px",
                }}
              >
                59
              </div>
            </li>
          </ul>
        </Card.Body>
      </div>
    </>
  );
};

export default NewCustomersThisMonth;

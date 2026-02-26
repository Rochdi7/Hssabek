"use client";

import Image from "next/image";
import { Card } from "react-bootstrap";

const NewCustomerThisMonth = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <span className="fs-14 d-block mb-2">New Customer This Month</span>

          <h2 className="fs-32 lh-1 mb-2">14.5K</h2>

          <span className="d-inline-block bg-success-80 border-success-70 border px-2 rounded-pill text-success-50 fs-12 fw-medium mb-2">
            +7%
          </span>

          <p className="fs-12">vs previous 30 days</p>

          <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap align-items-center customer-join mt-5 pt-3">
            <li className="item">
              <Image
                src="/images/user-82.png"
                alt="user"
                width={38}
                height={38}
              />
            </li>
            <li className="item">
              <Image
                src="/images/user-80.png"
                alt="user"
                width={38}
                height={38}
              />
            </li>
            <li className="item p">
              <span className="name">P</span>
            </li>
            <li className="item">
              <Image
                src="/images/user-81.png"
                alt="user"
                width={38}
                height={38}
              />
            </li>
            <li className="item s">
              <span className="name">s</span>
            </li>
            <li className="item">
              <Image
                src="/images/user-84.png"
                alt="user"
                width={38}
                height={38}
              />
            </li>
            <li className="item count">
              <span className="name">+24</span>
            </li>
          </ul>

          <h3 className="fs-12 fw-medium text-body mt-2 pt-1 mb-0">
            Joined Today
          </h3>
        </Card.Body>
      </Card>
    </>
  );
};

export default NewCustomerThisMonth;

"use client";

import { Card } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const InternalError = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="text-center">
            <Image
              src="/images/internal-error.png"
              className="mb-5"
              alt="error"
              width={400}
              height={437}
            />

            <h3 className="fs-24 mb-3">
              Looks like we did not find this page, please try again later.
            </h3>

            <p className="mb-4">
              But no worries! Our team is looking ever where while you wait
              safely.
            </p>

            <Link
              href="/dashboard/ecommerce/"
              className="btn btn-primary py-2 px-4 fs-16 fw-medium"
            >
              <span className="d-inline-block py-1">Back To Dashboard</span>
            </Link>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default InternalError;

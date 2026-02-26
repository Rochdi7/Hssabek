"use client";

import Image from "next/image";
import Link from "next/link";
import { Card } from "react-bootstrap";

const UpgradeYourPlan = () => {
  return (
    <>
      <Card className="custom-shadow rounded-3 bg-white border mb-4 py-2">
        <div className="p-4 text-center">
          <h3 className="fs-24 fw-medium mb-2">Upgrade Your Plan!</h3>

          <p
            className="fs-14 mb-3 pb-1 mx-auto"
            style={{
              lineHeight: 1.44,
              maxWidth: "307px",
            }}
          >
            Access advanced features, enhanced support, and exclusive tools
            designed to help you achieve more.
          </p>

          <div className="mb-3">
            <Image
              src="/images/upgrade-2.png"
              alt="upgrade"
              width={274}
              height={195}
            />
          </div>

          <Link
            href="#"
            className="btn btn-primary rounded-3 fs-16 fw-medium"
            style={{
              padding: "7px 21px",
            }}
          >
            <div className="d-flex align-items-center">
              <i className="ri-fire-fill fs-18"></i>
              <span className="ms-10">Upgrade Plan</span>
            </div>
          </Link>
        </div>
      </Card>
    </>
  );
};

export default UpgradeYourPlan;

"use client";

import { Card, Breadcrumb } from "react-bootstrap";
import Nav from "@/components/Settings/Nav"; 
import TermsAndConditions from "@/components/Settings/TermsAndConditions";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Terms & Conditions</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>
 
          <Breadcrumb.Item>
            <span className="fw-medium">Settings</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Terms & Conditions</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          {/* Nav */}
          <Nav />

          <TermsAndConditions />
        </Card.Body>
      </Card>
    </>
  );
}

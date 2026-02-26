"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap"; 
import DefaultBadges from "@/components/UIKit/Badges/DefaultBadges";
import RoundedPillBadges from "@/components/UIKit/Badges/RoundedPillBadges";
import SoftBadges from "@/components/UIKit/Badges/SoftBadges";
import SoftRoundedPillBadges from "@/components/UIKit/Badges/SoftRoundedPillBadges";
import HeadingsBadges from "@/components/UIKit/Badges/HeadingsBadges";
import OtherBadges from "@/components/UIKit/Badges/OtherBadges";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Badges</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">UI Elements</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Badges</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={6}>
          <DefaultBadges />

          <RoundedPillBadges />

          <HeadingsBadges />
        </Col>

        <Col lg={6}>
          <SoftBadges />

          <SoftRoundedPillBadges />

          <OtherBadges />
        </Col>
      </Row> 
    </>
  );
}

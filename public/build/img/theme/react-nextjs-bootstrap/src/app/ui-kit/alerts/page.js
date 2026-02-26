"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicAlerts from "@/components/UIKit/Alerts/BasicAlerts";
import BasicAlertsWithBG from "@/components/UIKit/Alerts/BasicAlertsWithBG";
import AlertsWithLink from "@/components/UIKit/Alerts/AlertsWithLink";
import OutlineAlerts from "@/components/UIKit/Alerts/OutlineAlerts";
import AlertsWithIcon from "@/components/UIKit/Alerts/AlertsWithIcon";
import AdditionalContent from "@/components/UIKit/Alerts/AdditionalContent";
import AlertDismissible from "@/components/UIKit/Alerts/AlertDismissible";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Alerts</h3>
 
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
            <span className="fw-medium">Alerts</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={6}>
          <BasicAlerts />

          <AlertsWithLink />

          <AlertsWithIcon />
        </Col>

        <Col lg={6}>
          <BasicAlertsWithBG />

          <OutlineAlerts />

          <AdditionalContent />

          <AlertDismissible />
        </Col>
      </Row>
    </>
  );
}

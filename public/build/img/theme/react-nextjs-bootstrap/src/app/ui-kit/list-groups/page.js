"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicListGroup from "@/components/UIKit/ListGroups/BasicListGroup";
import ActiveItems from "@/components/UIKit/ListGroups/ActiveItems";
import NumberedListGroup from "@/components/UIKit/ListGroups/NumberedListGroup";
import ListGroupWithBadge from "@/components/UIKit/ListGroups/ListGroupWithBadge";
import Linked from "@/components/UIKit/ListGroups/Linked";
import Flush from "@/components/UIKit/ListGroups/Flush";
import ContextualClasses from "@/components/UIKit/ListGroups/ContextualClasses";
import StyleActions from "@/components/UIKit/ListGroups/StyleActions";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">List Groups</h3>
 
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
            <span className="fw-medium">List Groups</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col xxl={6}>
          <BasicListGroup />

          <NumberedListGroup />

          <Linked />

          <ContextualClasses />
        </Col>

        <Col xxl={6}>
          <ActiveItems />

          <ListGroupWithBadge />

          <Flush />

          <StyleActions />
        </Col>
      </Row>
    </>
  );
}

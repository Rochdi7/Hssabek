"use client";
 
import { Breadcrumb } from "react-bootstrap";
import TestimonialsStyle1 from "@/components/ExtraPages/Testimonials/TestimonialsStyle1";
import TestimonialsStyle2 from "@/components/ExtraPages/Testimonials/TestimonialsStyle2";
import TestimonialsStyle3 from "@/components/ExtraPages/Testimonials/TestimonialsStyle3";
import TestimonialsStyle4 from "@/components/ExtraPages/Testimonials/TestimonialsStyle4";
import TestimonialsStyle5 from "@/components/ExtraPages/Testimonials/TestimonialsStyle5";
import TestimonialsStyle6 from "@/components/ExtraPages/Testimonials/TestimonialsStyle6";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Testimonials</h3>

        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Extra Pages</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Testimonials</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <TestimonialsStyle1 />

      <TestimonialsStyle2 />

      <TestimonialsStyle3 />

      <TestimonialsStyle4 />

      <TestimonialsStyle5 />

      <TestimonialsStyle6 />
    </>
  );
}
